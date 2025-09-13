
<?php
include("db/db.php");
include("includes/header.php");
?>

<!-- main Container -->
<div class="max-w-lg bg-white p-6 mt-10 rounded-xl shadow-lg mx-auto border border-gray-200">

  <?php if (isset($_SESSION['message'])) { ?>
    <script>
      alert("<?php echo $_SESSION['message']; ?>");
    </script>
    <?php unset($_SESSION['message']); ?>
  <?php } ?>

  <!-- form -->
  <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Add New Task</h2>
  <form action="task/save.php" method="POST" class="space-y-4">
      <input 
          type="text" 
          name="title"
          class="border border-gray-300 rounded-lg p-2 w-full 
          focus:outline-none focus:ring-2 focus:ring-blue-400" 
          placeholder="Task Title">

      <textarea 
          name="description"
          class="border border-gray-300 rounded-lg p-2 w-full h-28 
          focus:outline-none focus:ring-2 focus:ring-blue-400" 
          placeholder="Task Description"></textarea>

      <button 
          name="save"
          class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-lg 
          hover:from-blue-600 hover:to-blue-700 w-full font-semibold shadow-md transition">
          Save Task
      </button>
  </form>
</div>

<!-- Task Table -->
<div class="mt-20 flex flex-col items-center px-6">
  <h2 class="text-2xl font-bold text-gray-700 mb-6">Task List</h2>
  <table class="bg-white rounded-lg shadow-lg w-full md:w-3/4 text-center border border-gray-200">
    <thead class="bg-gradient-to-r from-gray-700 to-gray-800">
      <tr class="text-white">
        <th class="px-4 py-3">Title</th>
        <th class="px-4 py-3">Description</th>
        <th class="px-4 py-3">Created At</th>
        <th class="px-4 py-3">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM crud_php";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_array($result)) { ?>
      <tr class="hover:bg-gray-100 transition">
        <td class="border-t border-gray-200 px-4 py-2 text-gray-700"><?php echo htmlspecialchars($row['title']); ?></td>
        <td class="border-t border-gray-200 px-4 py-2 text-gray-600"><?php echo htmlspecialchars($row['description']); ?></td>
        <td class="border-t border-gray-200 px-4 py-2 text-gray-500"><?php echo htmlspecialchars($row['created_at']); ?></td>
        <td class="border-t border-gray-200 px-4 py-2">
          <a href="task/edit.php?id=<?php echo $row['id']; ?>" 
             class="text-green-600 hover:text-green-800 mx-2">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <a href="task/delete.php?id=<?php echo $row['id']; ?>" 
             class="text-red-500 hover:text-red-700 mx-2">
            <i class="fa-solid fa-trash"></i>
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php
include("includes/footer.php");
?>