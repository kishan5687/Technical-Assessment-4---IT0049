<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Task</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background-color: #f4f4f9; }
        .form-container { max-width: 500px; margin: auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="date"], textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        textarea { height: 100px; resize: vertical; }
        .error-text { color: red; font-size: 13px; margin-top: 3px; }
        .btn-submit { background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-cancel { color: #6c757d; text-decoration: none; margin-left: 10px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add New Task</h2>
    
    <?php $validation = session()->getFlashdata('validation'); ?>

    <form action="/tasks/create" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Task Title *</label>
            <input type="text" name="title" value="<?= old('title') ?>">
            <?php if(isset($validation) && $validation->hasError('title')): ?>
                <div class="error-text"><?= esc($validation->getError('title')) ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description"><?= old('description') ?></textarea>
        </div>

        <div class="form-group">
            <label>Task Date *</label>
            <input type="date" name="task_date" value="<?= old('task_date') ?>">
            <?php if(isset($validation) && $validation->hasError('task_date')): ?>
                <div class="error-text"><?= esc($validation->getError('task_date')) ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn-submit">Save Task</button>
        <a href="/tasks" class="btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>
