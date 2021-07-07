import React, { Component } from "react";
import { Field, reduxForm } from "redux-form";
import PropTypes from "prop-types";

class Form extends Component {
  static propTypes = {
    handleSubmit: PropTypes.func.isRequired,
    error: PropTypes.string,
  };

  renderField = (data) => {
    data.input.className = "form-control";

    const isInvalid = data.meta.touched && !!data.meta.error;
    if (isInvalid) {
      data.input.className += " is-invalid";
      data.input["aria-invalid"] = true;
    }

    if (this.props.error && data.meta.touched && !data.meta.error) {
      data.input.className += " is-valid";
    }

    return (
      <div className={`form-group`}>
        <label
          htmlFor={`catalogsales_${data.input.name}`}
          className="form-control-label"
        >
          {data.input.name}
        </label>
        <input
          {...data.input}
          type={data.type}
          step={data.step}
          required={data.required}
          placeholder={data.placeholder}
          id={`catalogsales_${data.input.name}`}
        />
        {isInvalid && <div className="invalid-feedback">{data.meta.error}</div>}
      </div>
    );
  };

  render() {
    return (
      <form onSubmit={this.props.handleSubmit}>
        <Field
          component={this.renderField}
          name="csQuantity"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="csWholesaleCost"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csListPrice"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csSalesPrice"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csExtDiscountAmt"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csExtSalesPrice"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csExtWholesaleCost"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csExtListPrice"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csExtTax"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csCouponAmt"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csExtShipCost"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csNetPaid"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csNetPaidIncTax"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csNetPaidIncShip"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csNetPaidIncShipTax"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csNetProfit"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csBillAddrSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csBillCustomerSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csBillCdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csBillHdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csCallCenterSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csCatalogPageSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csShipDateSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csSoldDateSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csItemSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csPromoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csShipAddrSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csShipCustomerSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csShipCdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csShipHdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csShipModeSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csSoldTimeSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="csWarehouseSk"
          type="text"
          placeholder=""
        />

        <button type="submit" className="btn btn-success">
          Submit
        </button>
      </form>
    );
  }
}

export default reduxForm({
  form: "catalogsales",
  enableReinitialize: true,
  keepDirtyOnReinitialize: true,
})(Form);
