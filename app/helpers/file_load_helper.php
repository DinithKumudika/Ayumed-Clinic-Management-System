<?php

$css = array(
     '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">',
     '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">',
     '<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/public/css/style.css">'
);

$js = array(
     '<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>"'
);


function loadLink($links){
     foreach ($links as $link) {
          echo $link;
     }
}


