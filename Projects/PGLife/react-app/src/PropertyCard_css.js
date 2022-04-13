import React from "react";
import {base_path} from ".utils.js";
import Interested from "./Interested_css";
import Stars from "./Stars_css";

const PropertyCard = () =>{
    return(
        <div className="property-card property-id-<?= $property['id'] ?> row">
        <div className="image-container col-md-4">
        <img src={base_path + "/img/properties/1/1d4f0757fdb86d5f.jpg"} alt="property" />
        </div>
        <div className="content-container col-md-8">
            <div className="row no-gutters justify-content-between">
                <Stars />
                <Interested />
            </div>
            <div classNameName="detail-container">
                <div classNameName="property-name">Navkar Paying Guest</div>
                <div classNameName="property-address">44, Juhu Scheme, Juhu, Mumbai, Maharashtra 400058</div>
                <div classNameName="property-gender">
                    <img src={base_path + "/img/male.png"} alt="gender" />
                </div>
            </div>
            <div className="row no-gutters">
                <div className="rent-container col-6">
                    <div className="rent">Rs 9,500/-</div>
                    <div className="rent-unit">per month</div>
                </div>
                <div className="button-container col-6">
                    <a href={base_path+"property_detail.php?property_id=<?= $property['id'] ?>"} className="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        </div>
    );
}

export default PropertyCard;