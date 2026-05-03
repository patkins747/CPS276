    <?php
class Validation {
    private $errors = [];

    // Check format based on regex type and set custom error message if provided
    public function checkFormat($value, $type, $customErrorMsg = null) {
        $patterns = [
            'name' => '/^[\p{L}\s\-\']+$/u',
            'phone' => '/^\d{3}\.\d{3}\.\d{4}$/',
            'address' => '/^[a-zA-Z0-9\s,.\'-]{1,100}$/',
            'city' => '/^[a-zA-Z\s\-\']{2,50}$/',
            'zip' => '/^\d{5}(-\d{4})?$/',
            'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'dob' => '~^(0[1-9]|1[012])/(0[1-9]|[12][0-9]|3[01])/(19|20)\d\d$~',
            'none' => '/.*/'
        ];
            
        

        // Use a generic default pattern if the type is not defined
        $pattern = $patterns[$type] ?? '/.*/';

        if (!preg_match($pattern, $value)) {
            $errorMessage = $customErrorMsg ?? "Invalid $type format.";
            $this->errors[$type] = $errorMessage;
            return false;
        }
        return true;
    }

    // Get all validation errors
    public function getErrors() {
        return $this->errors;
    }

    // Check if there are any errors
    public function hasErrors() {
        return !empty($this->errors);
    }
}
?>