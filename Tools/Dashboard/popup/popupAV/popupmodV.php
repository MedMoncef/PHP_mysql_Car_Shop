<div class="popup-overlay" id="popupOver">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopupMOD()">&times;</span>
        <h3>Modifier Voiture</h3>
        <form id="contactForm" method="POST" action="popup/popupAV/MOD.php">
            <div class="form-group">
                <label for="name">Nom de Voiture:</label>
                <input type="text" id="NomVM" name="NomVM" required>
            </div>
            <div class="form-group">
                <label for="PrixV">Prix de Voiture:</label>
                <input type="number" id="PrixV" name="PrixVM" required>
            </div>
            <div class="form-group">
                <label for="subject">Description:</label>
                <input type="text" id="descV" name="descVM" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Annuler</button>
            </div>
        </form>
    </div>
</div>