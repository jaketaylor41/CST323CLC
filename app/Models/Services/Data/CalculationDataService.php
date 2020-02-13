<?php
namespace App\Models\Services\Data;

use App\Models\Utility\DatabaseException;
use Illuminate\Support\Facades\Log;
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
        Log::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $calculation);
        try {
            $title = $calculation->getTitle();
            $result = $calculation->getResult();

            $stmt = $this->db->prepare('INSERT INTO calculations
                                            (TITLE, RESULT)
                                            VALUES (:title, :result)');
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':result', $result);
            $stmt->execute();

            Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $stmt->rowCount() . " row(s) affected");
            return $stmt->rowCount();
        } catch (PDOException $e) {
            Log::error("Exception ", array(
                "message" => $e->getMessage()
            ));
            Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with exception");
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // not implemented
    function read($calculation)
    {

    }

    /**
     *
     * @see DataServiceInterface readAll
     */
    function readAll()
    {
        Log::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1));
        try {
            $stmt = $this->db->prepare('SELECT * FROM calculations');
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $stmt->rowCount() . " row(s) found");
                return $stmt->rowCount();
            }

            $calculation_array = array();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $result["ID"];
                $title = $result['TITLE'];
                $result = $result['RESULT'];
                
                $c = new Calculation($id, $title, 0, 0, 0, $result);

                array_push($calculation_array, $c);
            }
            Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with UserModel array and " . $stmt->rowCount() . " row(s) found");
            return $calculation_array;
        } catch (PDOException $e) {
            Log::error("Exception ", array(
                "message" => $e->getMessage()
            ));
            Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with exception");
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // not implemented
    function update($user)
    {

    }

    // not implemented
    function delete($user)
    {

    }

}