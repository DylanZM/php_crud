<?php
include("../db/db.php");

$title = "";
$description = "";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM crud_php WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    } else {
        $_SESSION['message'] = 'Task not found';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "UPDATE crud_php SET title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = '✅ Task Updated Successfully';
    $_SESSION['message_type'] = 'success';
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit Task</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">✏️ Edit Task</h2>

        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" class="space-y-4">

            <div>
                <label class="block text-gray-600 font-medium mb-2">Task Title</label>
                <input
                    type="text"
                    name="title"
                    value="<?php echo htmlspecialchars($title); ?>"
                    placeholder="Enter task title"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>

            <div>
                <label class="block text-gray-600 font-medium mb-2">Task Description</label>
                <textarea
                    name="description"
                    placeholder="Enter task description"
                    class="w-full border border-gray-300 rounded-lg p-2 h-28 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required><?php echo htmlspecialchars($description); ?></textarea>
            </div>

            <button
                type="submit"
                name="update"
                class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-lg font-semibold 
               hover:from-green-600 hover:to-green-700 transition shadow-md">
                ✅ Update Task
            </button>
        </form>

        <a href="../index.php"
            class="block text-center mt-4 text-blue-500 hover:underline">
            ⬅ Back to Task List
        </a>
    </div>

</body>

</html>