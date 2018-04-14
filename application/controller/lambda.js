'use strict';



// --------------- Helpers to build responses which match the structure of the necessary dialog actions -----------------------

function elicitSlot(sessionAttributes, intentName, slots, slotToElicit, message, responseCard) {
    return {
        sessionAttributes,
        dialogAction: {
            type: 'ElicitSlot',
            intentName,
            slots,
            slotToElicit,
            message,
            responseCard,
        },
    };
}

function confirmIntent(sessionAttributes, intentName, slots, message, responseCard) {

    console.log(intentName);
    console.log(slots);
    console.log(message);
    console.log(responseCard);
    console.log(sessionAttributes);

    return {
        sessionAttributes,
        dialogAction: {
            type: 'ConfirmIntent',
            intentName,
            slots,
            message,
            responseCard,
        },
    };
}

function close(sessionAttributes, fulfillmentState, message, responseCard) {
    return {
        sessionAttributes,
        dialogAction: {
            type: 'Close',
            fulfillmentState,
            message,
            responseCard,
        },
    };
}

function delegate(sessionAttributes, slots) {
    return {
        sessionAttributes,
        dialogAction: {
            type: 'Delegate',
            slots,
        },
    };
}

function buildValidationResult(isValid, violatedSlot, messageContent) {
    return {
        isValid,
        violatedSlot,
        message: { contentType: 'PlainText', content: messageContent },
    };
}


// Build a responseCard with a title, subtitle, and an optional set of options which should be displayed as buttons.
function buildResponseCard(title, subTitle, options) {
    console.log("bulding response");
    console.log(options);

    let buttons = null;
    if (options != null) {
        buttons = [];
        for (let i = 0; i < Math.min(5, options.length); i++) {
            buttons.push(options[i]);
        }
    }
    return {
        contentType: 'application/vnd.amazonaws.card.generic',
        version: 1,
        genericAttachments: [{
            title,
            subTitle,
            buttons,
        }],
    };
}

function answerPrivacyCheck(slots)
{
    //check slots if ok.
    //slot1 - hosting type
    //slot2 - region
    //slot3 - data
    console.log('calculating privacy:', slots);
    var answer = "Your app is low risk please perform a standard vulnerability assessment.";
    var rating = 0;
    var hosting = slots.slotOne;
    var region = slots.slotTwo;
    var privacy = slots.slotThree;

    switch(hosting)
    {
        case "cloud":
            rating += 3;
            break;
        case "on premise":
            rating += 0;
            break;
        default:
            rating += 0;
    }

    switch(privacy)
    {
        case "pii":
            rating += 3;
            break;
        case "confidential":
            rating += 1;
            break;
        default:
            rating += 0;
    }

    switch(region)
    {
        case "eu":
            rating += "3";
            break;
        case "america":
            rating += 0;
            break;
        case "australia":
            rating += 2;
            break;
        default:
            rating += 0;
    }
    
    if(rating > 3)
    {
        answer = "You app could potentially expose confidential data. Please perform a detailed assessment and pen test.";
    }
    if(rating > 5)
    {
        answer = "You app needs significant security controls please check with the cyber team for custom recommendations.";
    }
    
    return answer;
}


// Build a list of potential options for a given slot, to be used in responseCard generation.
function buildOptions(slot, appointmentType) {
    console.log("build options");
    console.log(slot);
    if (slot === 'DataClassifications') {
        return [
            { text: 'PII', value: 'pii' },
            { text: 'Personal', value: 'personal' },
            { text: 'Confidential', value: 'confidential' },
            { text: 'Public', value: 'public' },
            { text: 'Intellectual Property', value: 'ip' },
        ];
    }
    }

 // --------------- Functions that control the skill's behavior -----------------------

/**
 * Performs dialog management and fulfillment for booking a dentists appointment.
 *
 * Beyond fulfillment, the implementation for this intent demonstrates the following:
 *   1) Use of elicitSlot in slot validation and re-prompting
 *   2) Use of confirmIntent to support the confirmation of inferred slot values, when confirmation is required
 *      on the bot model and the inferred slot values fully specify the intent.
 */
function makeAppointment(intentRequest, callback) {
    console.log('shaw');
    var responseMessage = "Thank you we are checking the information.";
    const dataClassType = intentRequest.currentIntent.slots.slotThree;
    const date = intentRequest.currentIntent.slots.Date; //null
    const time = intentRequest.currentIntent.slots.Time; //null
    const hostingType = intentRequest.currentIntent.slots.slotTwo;
    const regionType = intentRequest.currentIntent.slots.slotOne;
    const source = intentRequest.invocationSource;
    const outputSessionAttributes = intentRequest.sessionAttributes || {};
    //const bookingMap = JSON.parse(outputSessionAttributes.bookingMap || '{}');

    if (source === 'DialogCodeHook') {
        // Perform basic validation on the supplied input slots.
        const slots = intentRequest.currentIntent.slots;
        console.log('jeff');
        console.log(dataClassType);
        console.log('slots');
        console.log(slots);
        /*const validationResult = validateBookAppointment(dataClassType, date, time);
        if (!validationResult.isValid) {
            slots[`${validationResult.violatedSlot}`] = null;
            callback(elicitSlot(outputSessionAttributes, intentRequest.currentIntent.name,
            slots, validationResult.violatedSlot, validationResult.message,
            buildResponseCard(`Specify ${validationResult.violatedSlot}`, validationResult.message.content,
                buildOptions(validationResult.violatedSlot, dataClassType, date, bookingMap))));
            return;
        }*/
        if (!dataClassType) {
            console.log("getting first question");
            callback(elicitSlot(outputSessionAttributes, intentRequest.currentIntent.name,
            intentRequest.currentIntent.slots, 'slotThree',
            { contentType: 'PlainText', content: 'What type of data do you have in your environment?' },
            buildResponseCard('Specify Data Type', 'What type of data is in your environment?',
                buildOptions('DataClassifications', dataClassType, date, null))));
            return;
        }

        console.log('session attributes');
        console.log(outputSessionAttributes);
        console.log(slots);

        responseMessage = answerPrivacyCheck(slots);
        console.log(responseMessage);
        if(slots && (!slots.slotOne || !slots.slotTwo || !slots.slotThree))
        {
            
            console.log('slotty');
            console.log(slots);
            callback(delegate(outputSessionAttributes, slots));
            return;
        }
        else
        {
            responseMessage = answerPrivacyCheck(slots);
            console.log(responseMessage);
            console.log("nooo");
        }
    }
        console.log('closing');
        callback(close(outputSessionAttributes, 'Fulfilled', { contentType: 'PlainText',
        content: responseMessage || 'default' }));
}

 // --------------- Intents -----------------------

/**
 * Called when the user specifies an intent for this skill.
 */
function dispatch(intentRequest, callback) {
    // console.log(JSON.stringify(intentRequest, null, 2));
    console.log(`dispatch userId=${intentRequest.userId}, intent=${intentRequest.currentIntent.name}`);

    const name = intentRequest.currentIntent.name;

    console.log("Name: ", name);

    // Dispatch to your skill's intent handlers
    if (name === 'MakeAppointment') {
        return makeAppointment(intentRequest, callback);
    }
    throw new Error(`Intent with name ${name} not supported`);
}

// --------------- Main handler -----------------------

function loggingCallback(response, originalCallback) {
    // console.log(JSON.stringify(response, null, 2));
    originalCallback(null, response);
}

// Route the incoming request based on intent.
// The JSON body of the request is provided in the event slot.
exports.handler = (event, context, callback) => {
    try {
        // By default, treat the user request as coming from the America/New_York time zone.
        process.env.TZ = 'America/New_York';
        console.log(`event.bot.name=${event.bot.name}`);

        /**
         * Uncomment this if statement and populate with your Lex bot name and / or version as
         * a sanity check to prevent invoking this Lambda function from an undesired Lex bot or
         * bot version.
         */
        /*
        if (event.bot.name !== 'MakeAppointment') {
             callback('Invalid Bot Name');
        }
        */
        dispatch(event, (response) => loggingCallback(response, callback));
    } catch (err) {
        callback(err);
    }
};
