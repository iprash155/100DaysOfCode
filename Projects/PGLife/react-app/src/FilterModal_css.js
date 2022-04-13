import React from "react";
import { base_path } from "./utils.js";

const FilterModal = () =>{
    return(
        <div className="modal fade" id="filter-modal" tabindex="-1" role="dialog" aria-labelledby="filter-heading" aria-hidden="true">
            <div className="modal-dialog modal-dialog-centered" role="document">
                <div className="modal-content">
                    <div className="modal-header">
                        <h3 className="modal-title" id="filter-heading">Filters</h3>
                        <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div className="modal-body">
                        <h5>Gender</h5>
                        <hr />
                        <div>
                            <button className="btn btn-outline-dark btn-active">
                                No Filter
                            </button>
                            <button className="btn btn-outline-dark">
                                <i className="fas fa-venus-mars"></i>Unisex
                            </button>
                            <button className="btn btn-outline-dark">
                                <i className="fas fa-mars"></i>Male
                            </button>
                            <button className="btn btn-outline-dark">
                                <i className="fas fa-venus"></i>Female
                            </button>
                        </div>
                    </div>

                    <div className="modal-footer">
                        <button data-dismiss="modal" className="btn btn-success">Okay</button>
                    </div>
                </div>
            </div>
        </div>

    );
}

export default FilterModal;