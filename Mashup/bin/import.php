#!/usr/bin/env php
<?php
print("Usage: ./import text\n");

 /**

     * import.php
     *
     * Computer Science 50
     * Problem Set 8
     * Import data into MySQL table.
     */
    // requirement
     ini_set('auto_detect_line_endings',TRUE);
    require(__DIR__ . "/../includes/config.php");
    // make sure there is an appropriate number of command-line arguments
    if ($argc != 2)
    {
	print("Usage: ./import text");
	exit(1);
    } 
    // check if file exists
    if (!file_exists($argv[1]))
    {
	print("File does not exist.");
	exit(1);
    }
    // check if file is readable
    if (!is_readable($argv[1]))
    {
	print("File is not readable.");
	exit(1);
    }

// read file US.txt
    // TODO

// открываем файл для чтения
/*  CREATE TABLE IF NOT EXISTS `pset8`.`places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` char(2) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `place_name` varchar(180) NOT NULL,
  `admin_name1` varchar(100) NOT NULL,
  `admin_code1` varchar(20) NOT NULL,
  `admin_name2` varchar(100) NOT NULL,
  `admin_code2` varchar(20) NOT NULL,
  `admin_name3` varchar(100) NOT NULL,
  `admin_code3` varchar(20) NOT NULL,
  `latitude` decimal(7,4) NOT NULL,
  `longitude` decimal(7,4) NOT NULL,
  `accuracy` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`) 

ini_set('auto_detect_line_endings',TRUE);
$fh = fopen ( 'test.csv', 'r' );
for($i=0; $info = fgetcsv ($fh, 1000, " "); $i++)
{
// перебросим массив в переменные
// list($ser, $nam, $cou, $tel) = $info;

//$info -> sql 


// теперь можно выполнять разные действие с переменными
}
// закрываем файл
fclose ( $fh );*/

class CsvIterator implements Iterator
{
    const ROW_SIZE = 4096;
    /**
     * The pointer to the cvs file.
     * @var resource
     * @access private
     */
    private $filePointer = null;
    /**
     * The current element, which will 
     * be returned on each iteration.
     * @var array
     * @access private
     */
    private $currentElement = null;
    /**
     * The row counter. 
     * @var int
     * @access private
     */
    private $rowCounter = null;
    /**
     * The delimiter for the csv file. 
     * @var str
     * @access private
     */
    private $delimiter = null;

    /**
     * This is the constructor.It try to open the csv file.The method throws an exception
     * on failure.
     *
     * @access public
     * @param str $file The csv file.
     * @param str $delimiter The delimiter.
     *
     * @throws Exception
     */
    public function __construct($file, $delimiter=',')
    {
        try {
            $this->filePointer = fopen($file, 'r');
            $this->delimiter = $delimiter;
        }
        catch (Exception $e) 
{
            throw new Exception('The file "'.$file.'" cannot be read.');
        } 
    }

    /**
     * This method resets the file pointer.
     *
     * @access public
     */
    public function rewind() 
{
        $this->rowCounter = 0;
        rewind($this->filePointer);
    }

    /**
     * This method returns the current csv row as a 2 dimensional array
     *
     * @access public
     * @return array The current csv row as a 2 dimensional array
     */
    public function current() 
{
        $this->currentElement = fgetcsv($this->filePointer, self::ROW_SIZE, $this->delimiter);
        $this->rowCounter++; 
        return $this->currentElement;
    }

    /**
     * This method returns the current row number.
     *
     * @access public
     * @return int The current row number
     */
    public function key()
 {
        return $this->rowCounter;
    }

    /**
     * This method checks if the end of file is reached.
     *
     * @access public
     * @return boolean Returns true on EOF reached, false otherwise.
     */
    public function next() 
{
        return !feof($this->filePointer);
    }

    /**
     * This method checks if the next row is a valid row.
     *
     * @access public
     * @return boolean If the next row is a valid row.
     */
    public function valid() 
{
        if (!$this->next()) {
            fclose($this->filePointer);
            return false;
        }
        return true;
    }
}
// Usage :




$csvIterator = new CsvIterator($argv[1],"\t");
print("Wait for import:");
foreach ($csvIterator as $row => $data) 
{
print(".");
    // do somthing with $data
query("INSERT INTO places (country_code, postal_code, place_name,
	      admin_name1, admin_code1, admin_name2, admin_code2, admin_name3,
	      admin_code3, latitude, longitude, accuracy) VALUES(?, ?, ?, ?,
	      ?, ?, ?, ?, ?, ?, ?, ?)", $data[0], $data[1], $data[2], $data[3],
	      $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10],
	      $data[11]);


}
print(". Done!\n");


?>
