<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background-color: #f4f4f9; }
        .form-container { max-width: 500px; margin: auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="date"], select, textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        textarea { height: 100px; resize: vertical; }
        .error-text { color: red; font-size: 13px; margin-top: 3px; }
        .btn-submit { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-cancel { color: #6c757d; text-decoration: none; margin-left: 10px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Modify Task Properties</h2>
    
    <?php $validation = session()->getFlashdata('validation'); ?>

    <form action="/tasks/update/<?= $task['id'] ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Task Title *</label>
            <input type="text" name="title" value="<?= old('title', $task['title']) ?>">
            <?php if(isset($validation) && $validation->hasError('title')): ?>
                <div class="error-text"><?= esc($validation->getError('title')) ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description"><?= old('description', $task['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Task Date *</label>
            <input type="date" name="task_date" value="<?= old('task_date', $task['task_date']) ?>">
            <?php if(isset($validation) && $validation->hasError('task_date')): ?>
                <div class="error-text"><?= esc($validation->getError('task_date')) ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Current Status</label>
            <select name="status">
                <option value="Pending" <?= $task['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="In Progress" <?= $task['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                <option value="Completed" <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Apply Changes</button>
        <a href="/tasks" class="btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>
