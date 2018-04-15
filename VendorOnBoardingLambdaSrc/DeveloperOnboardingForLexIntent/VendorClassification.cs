using System;
using System.Collections.Generic;
using System.Reflection.Metadata;
using System.Reflection.Metadata.Ecma335;
using System.Text;
using Newtonsoft.Json;

namespace DeveloperOnboardingForLexIntent
{
    /// <summary>
    /// A utility class to store all the current values from the intent's slots.
    /// </summary>
    public class VendorClassification
    {
        public string Classification { get; set; }

        public string HasExperienceInField { get; set; }

        public string UnderstandsBusinessNeeds { get; set; }
        
        public string CanEvolveAroundMarket { get; set; }

        [JsonIgnore]
        public bool HasRequiredFields => string.IsNullOrWhiteSpace(Classification)
                                         && string.IsNullOrWhiteSpace(HasExperienceInField)
                                         && string.IsNullOrWhiteSpace(UnderstandsBusinessNeeds)
                                         && string.IsNullOrWhiteSpace(CanEvolveAroundMarket);


    }
}
