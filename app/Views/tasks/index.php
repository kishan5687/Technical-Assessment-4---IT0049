<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; }
        .header { display: flex; justify-content: space-between; align-items: center; background: white; padding: 15px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #007bff; color: white; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .btn-add { background-color: #28a745; color: white; font-weight: bold; }
        .btn-edit { background-color: #ffc107; color: black; margin-right: 5px; }
        .btn-delete { background-color: #dc3545; color: white; }
        .alert-success { color: green; font-weight: bold; margin-bottom: 15px; }
        .alert-error { color: red; font-weight: bold; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="header">
    <h2>Tasks for Today</h2>
    <div>
        <?php if (session()->get('isLoggedIn')): ?>
            <span>Welcome, <strong><?= esc(session()->get('username')) ?></strong>!</span> | 
            <a href="/logout">Logout</a>
        <?php else: ?>
            <a href="/login">System Login (Management)</a>
        <?php endif; ?>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <p class="alert-success"><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <p class="alert-error"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<?php if (session()->get('isLoggedIn')): ?>
    <p><a href="/tasks/new" class="btn btn-add">+ Create New Task</a></p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Task Title</th>
            <th>Description</th>
            <th>Task Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($tasks) && is_array($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><strong><?= esc($task['title']) ?></strong></td>
                    <td><?= esc($task['description']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td>
                        <?php if (session()->get('isLoggedIn')): ?>
                            <a href="/tasks/edit/<?= $task['id'] ?>" class="btn btn-edit">Edit</a>
                            <a href="/tasks/delete/<?= $task['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to archive this task?');">Delete</a>
                        <?php else: ?>
                            <span style="color: gray; font-style: italic;">Read-Only</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?> 
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align: center; color: gray;">No active tasks found today.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
