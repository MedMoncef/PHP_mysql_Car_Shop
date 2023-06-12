<div class="popup-overlay" id="popupOver">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopupMOD()">&times;</span>
        <h3>Modifier Contact</h3>
        <form id="contactForm" method="POST" action="popup/popupCon/MOD.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="Name" name="Name" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="Subject" name="Subject" required>
            </div>
            <div class="form-group">
                <label for="Message">Message:</label>
                <input type="text" id="Message" name="Message" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Annuler</button>
            </div>
        </form>
    </div>
</div>