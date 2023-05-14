<div class="popup-overlay" id="popupOver">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopupMOD()">&times;</span>
        <h3>Modifier User</h3>
        <form id="contactForm" method="POST" action="Modify/MOD.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="Name" name="Name">
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" id="Email" name="Email">
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="text" id="Password" name="Password">
            </div>
            <div class="form-group">
                <input type="file" name="profile_image" id="profile_image">
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Annuler</button>
            </div>
        </form>
    </div>
</div>