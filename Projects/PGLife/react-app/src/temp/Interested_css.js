import React from "react";

const Interested = () =>{
    return(
        <div className="interested-container">
            <i className="is-interested-image fas fa-heart" property_id="<?= $property['id'] ?>"></i>
            <div className="interested-text">
                <span className="interested-user-count">3</span> interested
            </div>
        </div>
    );
}

export default Interested;