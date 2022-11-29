<?php

function Navbar($title, $backlink)
{
    echo "
    <div class='top'>
        <a href='" . $backlink . "'><img src='assets/arrowback.png' alt='arrow' id='arrow'> </a>
        <div>
            <h1 id='titlePage'>" . $title . "</h1>
        </div>
    </div>
    
    ";
}