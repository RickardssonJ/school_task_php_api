<?PHP

class App
{

    public static $errors = array();

    public static function main($data)
    {
        $limit = $_GET['show'] ?? false;
        $category =  $_GET['category'] ?? false;
        $response = array();


        // if ($limit > 20 || $limit < 0) {
        //     $error = "Please enter a limit between 1 and 20";
        //     $json = json_encode($error, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //     echo $json;
        //     exit();
        // } else if ($category != "fire" && $category != "grass" && $category != "electric" && $category != "water" && $category != false) {
        //     $error = "Bad request category does not exist";
        //     $json = json_encode($error, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //     echo $json;
        //     exit();
        // }

        if ($limit && $category) {
            try {
                $pokemons =  self::getCategory($category, $data);
                $response = self::getLimit($limit, $pokemons);
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        } else if ($limit) {
            $response = self::getLimit($limit, $data);
        } else if ($category) {
            $response =  self::getCategory($category, $data);
        } else {
            $response = $data;
        }

        self::renderData($response);
    }

    //A method that creates an array of random indexes that i later can use so that i dont get any duplicates when rendering out items
    public static function getRandomIndexes($min, $max, $quantity)
    {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    public static function getLimit($limit, $data)
    {
        if ($limit > 20 || $limit < 0) {
            throw new Exception("Limit needs to be between 1 and 20");
        }

        $output = array();
        $randomIndexes = self::getRandomIndexes(0, count($data) - 1, $limit);

        foreach ($randomIndexes as $value) {
            array_push($output, $data[$value]);
        }
        return $output;
    }

    public static function getCategory($category, $data)
    {
        $output = array();

        foreach ($data as $value) {
            if ($value['category'] == $category) {
                array_push($output, $value);
            }
        }
        return $output;
    }

    public static function renderData($allData)
    {
        if (self::$errors) {
            echo "iam in errors";
            print_r(self::$errors);
        } else {
            $json = json_encode($allData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            echo $json;
        }
    }
}
