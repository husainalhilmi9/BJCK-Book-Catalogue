<?php
include('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $bookID = $_POST['tbl_book_id'];
    $bookISBN = $_POST['book_isbn'];
    $bookTitle = $_POST['book_title'];
    $bookAuthor = $_POST['book_author'];
    $bookPublisher = $_POST['book_publisher'];
    $bookSection = $_POST['book_section'];

    // Update the book information in the database
    $stmt = $conn->prepare("UPDATE `tbl_book` SET `book_isbn` = ?, `book_title` = ?, `book_author` = ?, `book_publisher` = ?, `book_section` = ? WHERE `tbl_book_id` = ?");
    $stmt->execute([$bookISBN, $bookTitle, $bookAuthor, $bookPublisher, $bookSection, $bookID]);

    // Redirect to the page where you want to display the updated book details
    echo "<script>
        alert('Update Success!'); 
        window.location.href = 'http://localhost/book-catalog-app/index.php';
        </script>";
    exit();
}
?>
