<?php
$type     = 'mysql';                 // Type of database
$server   = 'localhost';             // Server the database is on
$db       = 'test';             // Name of the database
$port     = '3306';                      // Port is usually 8889 in MAMP and 3306 in XAMPP
$charset  = 'utf8mb4';               // UTF-8 encoding using 4 bytes of data per character

$username = 'root';         // Enter YOUR username here
$password = '';         // Enter YOUR password here

$options  = [                        // Options for how PDO works
    //điều này sẽ cho phép PDO ném ra ngoại lệ (exception) khi có lỗi xảy ra, thay vì trả về giá trị false như mặc định.
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    //điều này sẽ cho phép PDO trả về các bản ghi dưới dạng một mảng liên hợp với tên cột làm khóa và giá trị là giá trị của cột đó
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    /*Diều này sẽ tắt chế độ mô phỏng chuẩn bị truy vấn của PDO. 
    Điều này sẽ buộc PDO phải sử dụng cơ chế chuẩn bị truy vấn thực sự (prepared statements), 
    điều này giúp cho việc tránh được các cuộc tấn công SQL injection*/
    PDO::ATTR_EMULATE_PREPARES   => false,
];                                                                  // Set PDO options

// DO NOT CHANGE ANYTHING BENEATH THIS LINE
$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset"; // Create DSN
try {                                                               // Try following code
    $pdo = new PDO($dsn, $username, $password, $options);           // Create PDO object
} catch (PDOException $e) {                                         // If exception thrown
    throw new PDOException($e->getMessage(), $e->getCode());        // Re-throw exception
}
// hàm cơ sở dữ liệu
function pdo(PDO $pdo, string $sql, array $arguments = null)
{
    if (!$arguments) {                   // If no arguments
        return $pdo->query($sql);        // Run SQL and return PDOStatement object
    }
    $statement = $pdo->prepare($sql);    // If arguments prepare statement
    $statement->execute($arguments);     // Execute statement
    return $statement;                   // Return PDOStatement object
}
?>


