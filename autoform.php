<?php

class autoform
{

    public function getInputText($label, $name)
    {

        echo '<p><label for="' . $name . '">' . $label . ' : </label>';
        echo '<input type="text" id="' . $name . '" name="' . $name . '"></p>';

    }

    public function getInputTextValue($label, $name, $value)
    {

        echo '<p><label for="' . $name . '">' . $label . ' : </label>';
        echo '<input type="text" id="' . $name . '" name="' . $name . '" value=" ' . $value . ' "></p>';

    }

    public function getInputSubmit($label)
    {

        echo '<input type="submit" id="' . $label . '" name="' . $label . '"><br>';

    }

    public function getInputList($label, $name, $values)
    {

        echo '<p><label for="' . $name . '">' . $label . ' : </label><br>';
        echo '<select id="' . $name . '" name="' . $name . '">';
        foreach ($values as $value) {
            echo '<option value="' . $value . '">' . $value . '</option>';
        }
        echo "</select></p>";

    }

    public function getInputRadio($label, $name, $values)
    {
        echo '<p><label for="' . $name . '">' . $label . ' : </label> ';
        foreach ($values as $value) {
            echo '<label for="' . $name . '">' . $value . '</label>';
            echo '<input type="radio" id="' . $name . '" name="' . $name . '" value="' . $value . '">';
        }
    }

    public function getInputPassword($label, $name)
    {
        echo '<p><label for="' . $name . '">' . $label . ' : </label> ';
        echo '<input type="password" id="' . $name . '" name="' . $name . '" minlength="8" required></p>';
    }

    public function getInputDate($label, $name)
    {
        echo '<p><label for="' . $name . '">' . $label . ' : </label> ';
        echo '<input type="date" id="' . $name . '" name="' . $name . '" min="2018-01-01" max="2018-12-31"></p>';
    }

    public function getInputTextArea($label, $name)
    {
        echo '<p><label for="' . $name . '">' . $label . ' : </label></p>';
        echo '</p><textarea id="' . $name . '" name="' . $name . '" rows="5" cols="33"></textarea></p>';
    }


}

?>