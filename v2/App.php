<?PHP

class App
{

    public static $errors = array();

    public static function main($data)
    {
        $limit = $_GET['limit'] ?? false;
        $category =  $_GET['category'] ?? false;
        $response = array();

        if ($category) {
            try {
                $response =  self::get_category($category, $data);
            } catch (Exception $error) {
                array_push(self::$errors, ['Category' => $error->getMessage()]);
            }
        } else {
            $response = $data;
        }
        if ($limit) {
            try {
                $response = self::get_limit($limit, $response);
            } catch (Exception $error) {
                array_push(self::$errors, ['limit' => $error->getMessage()]);
            }
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


    public static function get_limit($limit, $data)
    {
        if ($limit > 20 || $limit < 0) {
            throw new Exception("limit needs to be between 1 and 20");
        }

        $output = array();
        $randomIndexes = self::getRandomIndexes(0, count($data) - 1, $limit);

        foreach ($randomIndexes as $value) {
            array_push($output, $data[$value]);
        }

        return $output;
    }

    public static function get_category($category, $data)
    {

        if ($category != "fire" && $category != "grass" && $category != "electric" && $category != "water" && $category != false) {
            throw new Exception("Category not found");
        }
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
            $json = json_encode(self::$errors, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            echo $json;
        } else {
            echo "RENDER DATA";
            $json = json_encode($allData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            echo $json;
        }
    }
}
