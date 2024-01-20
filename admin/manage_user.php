<?php include 'header.php'; ?>
          <h1>Manage User ></h1>
          <div class="p-4">
            <table class="table-auto">
              <thead class="">
                <tr class="m-4">
                  <th class="p-4">S.N</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="">
                  <td class="p-4">1</td>
                  <td>Sam Sulek</td>
                  <td>sulek@gmail.com</td>
                  <td>
                    <input
                      class="py-2 px-4 bg-stone-800 text-white rounded-md"
                      type="submit"
                      name="edit"
                      value="Edit"
                    />
                    <input
                      class="py-2 px-4 bg-red-800 text-white rounded-md"
                      type="submit"
                      name="delete"
                      value="Delete"
                    />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
