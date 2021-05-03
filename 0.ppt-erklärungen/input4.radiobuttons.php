<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form achtion="" method="post">
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>

        <input type="submit" value="submit">
    </form>
    <?php
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
            
            switch ($gender) {
                case 'male':
                    echo "Male";
                    break;

                case 'female':
                    echo "Female";
                    break;

                case 'other':
                    echo "Other";
                    break;

                default:
                    echo "Gender required";
                    break;
            }
        }
    ?>
</body>
</html>