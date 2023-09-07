<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Multi-Axis Line Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <input type="text" id="username" class="form-control" />
    <label class="floating-label">Username</label>
</body>
<style>
    .floating-label-group {
        position: relative;
        margin-top: 15px;
        margin-bottom: 25px;
    }

    .floating-label {
        font-size: 13px;
        color: #cccccc;
        position: absolute;
        pointer-events: none;
        top: 9px;
        left: 12px;
        transition: all 0.1s ease;
    }

    input:focus~.floating-label,
    input:not(:focus):valid~.floating-label {
        top: -15px;
        bottom: 0px;
        left: 0px;
        font-size: 11px;
        opacity: 1;
        color: #404040;
    }

    .row {
        margin-top: 50px;
    }
</style>