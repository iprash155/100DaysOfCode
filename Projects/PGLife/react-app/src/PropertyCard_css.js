import React from "react";
import {base_path} from ".utils.js";
import Interested from "./Interested_css";
import Stars from "./Stars_css";

const PropertyCard = () =>{
    return(
        <div class="property-card property-id-<?= $property['id'] ?> row">
        <div class="image-container col-md-4">
        <img src={base_path + "/img/properties/1/1d4f0757fdb86d5f.jpg"} alt="property" />
        </div>
        <div class="content-container col-md-8">
            <div class="row no-gutters justify-content-between">
                <Stars />
                <Interested />
            </div>
            <div className="detail-container">
                <div className="property-name">Navkar Paying Guest</div>
                <div className="property-address">44, Juhu Scheme, Juhu, Mumbai, Maharashtra 400058</div>
                <div className="property-gender">
                    <img src={base_path + "/img/male.png"} alt="gender" />
                </div>
            </div>
            <div class="row no-gutters">
                <div class="rent-container col-6">
                    <div class="rent">Rs 9,500/-</div>
                    <div class="rent-unit">per month</div>
                </div>
                <div class="button-container col-6">
                    <a href={base_path+"property_detail.php?property_id=<?= $property['id'] ?>"} class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        </div>
    );
}

export default PropertyCard;