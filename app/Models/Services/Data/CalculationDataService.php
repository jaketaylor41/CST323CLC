<?php
/**
 * Data Service | app/Models/Services/Data/CalculationDataService.php
 *
 * @package     cst323_milestone
 * @author      Henry Harvey & Jacob Taylor
 */
namespace App\Models\Services\Data;

use App\Models\Utility\DatabaseException;
use App\Models\Utility\MyLogger;
use PDO;
use PDOException;
use App\Models\Calculation;

class CalculationDataService implements DataServiceInterface
{

    private $db = NULL;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     *
     * @see DataServiceInterface create
     */
    function create($calculation)
    {
        MyLogger::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $calculation);
        try {
            // Sets variables for each parameter of the object
            $title = $calculation->getTitle();
            $result = $calculation->getResult();

            // Creates an INSERT sql statement from the database
            $stmt = $this->db->prepare('INSERT INTO calculations
                                            (TITLE, RESULT)
                                            VALUES (:title, :result)');
            // Binds the paramters of the sql statement equal to the variables
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':result', $result);
            // Executes the sql statement
            $stmt->execute();

            // Returns the number of rows affected
            MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $stmt->rowCount() . " row(s) affected");
            return $stmt->rowCount();
        } catch (PDOException $e) {
            // If pdo exception, throw database exception
            MyLogger::error("Exception ", array(
                "message" => $e->getMessage()
            ));
            MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with exception");
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // not implemented
    function read($calculation)
    {}

    /**
     *
     * @see DataServiceInterface readAll
     */
    function readAll()
    {
        MyLogger::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1));
        try {
            // Creates a SELECT sql statement from the database
            $stmt = $this->db->prepare('SELECT * FROM calculations');
            // Executes the sql statement
            $stmt->execute();

            // If rows affected equals 0, return 0
            if ($stmt->rowCount() == 0) {
                MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $stmt->rowCount() . " row(s) found");
                return $stmt->rowCount();
            }

            // Create an array
            $calculation_array = array();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $title = $result['TITLE'];
                $result = $result['RESULT'];

                // Create a new object with each found row's columns
                $c = new Calculation($title, 0, 0, 0, $result);

                // Add each to the array
                array_push($calculation_array, $c);
            }
            // Return the array
            MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with UserModel array and " . $stmt->rowCount() . " row(s) found");
            return $calculation_array;
        } catch (PDOException $e) {
            // If pdo exception, throw database exception
            MyLogger::error("Exception ", array(
                "message" => $e->getMessage()
            ));
            MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with exception");
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // not implemented
    function update($user)
    {}

    // not implemented
    function delete($user)
    {}
}