using System;
using System.Collections.Generic;
using System.Text;
using Amazon.Lambda.Core;
using Amazon.Lambda.LexEvents;

namespace DeveloperOnboardingForLexIntent
{
    public class LocalVenderIntentProcessor : AbstractIntentProcessor
    {
        public const string HAS_EXPERIENCE_IN_FIELD_SLOT = "HasExperienceInField";
        public const string UNDERSTANDS_BUSINESS_NEEDS_SLOT = "UnderstandBusinessNeeds";
        public const string CAN_EVOLVE_AROUND_MARKET_SLOT = "CanEvolveAroundMarket";

        public override LexResponse Process(LexEvent lexEvent, ILambdaContext context)
        {
            var slots = lexEvent.CurrentIntent.Slots;
            var sessionAttributes = lexEvent.SessionAttributes ?? new Dictionary<string, string>();

            var vendorClassification = new VendorClassification
            {
                Classification = "Local",
                CanEvolveAroundMarket = slots.ContainsKey(CAN_EVOLVE_AROUND_MARKET_SLOT) ? slots[CAN_EVOLVE_AROUND_MARKET_SLOT] : null,
                UnderstandsBusinessNeeds = slots.ContainsKey(UNDERSTANDS_BUSINESS_NEEDS_SLOT) ? slots[UNDERSTANDS_BUSINESS_NEEDS_SLOT] : null,
                HasExperienceInField = slots.ContainsKey(HAS_EXPERIENCE_IN_FIELD_SLOT) ? slots[HAS_EXPERIENCE_IN_FIELD_SLOT] : null,
            };

            if (string.Equals(lexEvent.InvocationSource, "DialogCodeHook", StringComparison.Ordinal))
            {
                var validationResult = Validate(vendorClassification);

                if (!validationResult.IsValid)
                {
                    slots[validationResult.ViolationSlot] = null;
                    return ElicitSlot(sessionAttributes, lexEvent.CurrentIntent.Name, slots,
                        validationResult.ViolationSlot, validationResult.Message);
                }

                return Delegate(sessionAttributes, slots);
            }

            return Close(
                sessionAttributes,
                "Fulfilled",
                new LexResponse.LexMessage
                {
                    ContentType = MESSAGE_CONTENT_TYPE,
                    Content = "Thanks, I have submitted your data for processing, enjoy the rest of your day."
                }
            );
        }

        private ValidationResult Validate(VendorClassification vendorClassification)
        {
            if (!string.IsNullOrEmpty(vendorClassification.HasExperienceInField) &&
                !TypeValidators.IsValidBooleanResponse(vendorClassification.HasExperienceInField))
            {
                return new ValidationResult(false, HAS_EXPERIENCE_IN_FIELD_SLOT, "You must provide a positive or negative response.");
            }

            if (!string.IsNullOrEmpty(vendorClassification.UnderstandsBusinessNeeds) &&
                !TypeValidators.IsValidBooleanResponse(vendorClassification.UnderstandsBusinessNeeds))
            {
                return new ValidationResult(false, UNDERSTANDS_BUSINESS_NEEDS_SLOT, "You must provide a positive or negative response.");
            }

            if (!string.IsNullOrEmpty(vendorClassification.CanEvolveAroundMarket) &&
                !TypeValidators.IsValidBooleanResponse(vendorClassification.CanEvolveAroundMarket))
            {
                return new ValidationResult(false, CAN_EVOLVE_AROUND_MARKET_SLOT, "You must provide a positive or negative response.");
            }

            return ValidationResult.VALID_RESULT;
        }
    }
}
