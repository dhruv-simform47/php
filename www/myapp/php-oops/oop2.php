<?php
class Attendence {
    // Simulated database data
    private static $attendence = [
        ['id' => 1, 'status' => ''],
        ['id' => 2, 'status' => '']
    ];

    public static function __callStatic($name,$arg) {
    
        if (str_starts_with($name, 'UpdateTo')) {
            
            
            $value = strtolower(str_replace('UpdateTo', '', $name));
            

            // echo "--- Searching database for $column = $valueToFind ---\n";

            // 2. Logic to search our "database"
            $attendence['status'] = $value;
            }
            
        }
 
}

// REAL WORLD USAGE:
// These methods are NOT defined in the class, but they work!
print_r(Attendence::UpdateToPresent('Dhruv'));
print_r(Attendence::UpdateToAbsent('Dhruv'));


?>