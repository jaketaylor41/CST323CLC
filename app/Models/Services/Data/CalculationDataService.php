<?php
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
            $title = $calculation->getTitle();
            $result = $calculation->getResult();

            $stmt = $this->db->prepare('INSERT INTO calculations
                                            (TITLE, RESULT)
                                            VALUES (:title, :result)');
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':result', $result);
            $stmt->execute();

            MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $stmt->rowCount() . " row(s) affected");
            return $stmt->rowCount();
        } catch (PDOException $e) {
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
            $stmt = $this->db->prepare('SELECT * FROM calculations');
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $stmt->rowCount() . " row(s) found");
                return $stmt->rowCount();
            }

            $calculation_array = array();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $title = $result['TITLE'];
                $result = $result['RESULT'];

                $c = new Calculation($title, 0, 0, 0, $result);

                array_push($calculation_array, $c);
            }
            MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with UserModel array and " . $stmt->rowCount() . " row(s) found");
            return $calculation_array;
        } catch (PDOException $e) {
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