<?php
include('../conn/conn.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$bookISBN = $_POST['book_isbn'];
$bookTitle = $_POST['book_title'];
$bookAuthor = $_POST['book_author'];
$bookPublisher = $_POST['book_publisher'];
$bookSection = $_POST['book_section'];
$bookTimeAdded = date("Y-m-d H:i:s");

try {
    // Insert the book into the database without checking for duplicates
    $stmt = $conn->prepare("INSERT INTO `tbl_book` (`tbl_book_id`, `book_isbn`, `book_title`, `book_author`, `book_publisher`, `book_section`, `time_added`) VALUES (NULL, :bookISBN, :bookTitle, :bookAuthor, :bookPublisher, :bookSection, :bookTimeAdded)");
    $stmt->bindParam(':bookISBN', $bookISBN);
    $stmt->bindParam(':bookTitle', $bookTitle);
    $stmt->bindParam(':bookAuthor', $bookAuthor);
    $stmt->bindParam(':bookPublisher', $bookPublisher);
    $stmt->bindParam(':bookSection', $bookSection);
    $stmt->bindParam(':bookTimeAdded', $bookTimeAdded);
    $stmt->execute();

    echo "<script>
    alert('Book added successfully!'); 
    window.location.href = 'http://localhost/book-catalog-app/index.php';
    </script>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


