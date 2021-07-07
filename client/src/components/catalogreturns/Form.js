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
          htmlFor={`catalogreturns_${data.input.name}`}
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
          id={`catalogreturns_${data.input.name}`}
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
          name="crReturnQuantity"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="crReturnAmount"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturnTax"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturnAmtIncTax"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crFee"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturnShipCost"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crRefundedCash"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReversedCharge"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crStoreCredit"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crNetLoss"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crRefundedAddrSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturningAddrSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crRefundedCustomerSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturningCustomerSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crCallCenterSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crRefundedCdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturningCdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crCatalogPageSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturnedDateSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crRefundedHdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturningHdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crItemSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReasonSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crShipModeSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crReturnedTimeSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="crWarehouseSk"
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
  form: "catalogreturns",
  enableReinitialize: true,
  keepDirtyOnReinitialize: true,
})(Form);
