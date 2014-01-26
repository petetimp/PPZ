<script>document.title="Contact Us";</script>
<script src="Includes/formProcesses.js"></script>
<a name="contact"></a>
<img id="contactMessage" class="pHeader" src="Includes/contactus.jpg" alt="Contact Us"/>

<div class="content">
	<form method="post" id="contactForm" onSubmit="return false">
    	<fieldset>
        <legend>Enter your information below:</legend>
            <table>
                <tr><td><label for="Firstname">First Name:</label></td><td> <input type="text" name="Firstname" id="Firstname"/></td></tr>
                <tr><td><label for="LastName">Last Name:</label></td><td> <input type="text" name="Lastname" id="Lastname"/></td></tr>    	
                <tr><td><label for="Email">E-mail:</label></td><td><input type="text" name="Email" id="Email"/></td></tr>
                <tr><td>Message:</td></tr>
                <tr><td colspan="2"><textarea name="Message" id="Message" rows="8" cols="70" onchange="checkTextArea(this, 500);"></textarea></td></tr>
                <tr><td><input id="contactButton" class="formButton" type="submit" value="Submit"></td><td><input class="formButton" type="reset" value="Reset"></td></tr>
            </table>
        </fieldset>
    </form>
    <div id="mailMsg"></div>
</div>