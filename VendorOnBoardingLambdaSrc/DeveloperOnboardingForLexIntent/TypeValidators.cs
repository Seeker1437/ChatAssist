using System;
using System.Collections.Generic;
using System.Collections.Immutable;
using System.Text;

namespace DeveloperOnboardingForLexIntent
{
    /// <summary>
    /// Stub implementation that validates input values.
    /// </summary>
    public static class TypeValidators
    {
        public static bool IsValidBooleanResponse(string value)
        {
            var isBoolDirect = bool.TryParse(value, out var boolean);
            return isBoolDirect || value.ToLower() == "true" || value.ToLower() == "yes" || value.ToLower() == "false" ||
                   value.ToLower() == "no";
        }    
    }
}
