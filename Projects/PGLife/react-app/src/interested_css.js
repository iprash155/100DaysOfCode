import React from "react";

const Interested = () =>{
    return(
        <div class="interested-container">
            <i class="is-interested-image fas fa-heart" property_id="<?= $property['id'] ?>"></i>
            <div class="interested-text">
                <span class="interested-user-count">3</span> interested
            </div>
        </div>
    );
}

export default Interested;