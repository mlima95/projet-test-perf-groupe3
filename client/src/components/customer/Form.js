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
          htmlFor={`customer_${data.input.name}`}
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
          id={`customer_${data.input.name}`}
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
          name="cCustomerId"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cSalutation"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cFirstName"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cLastName"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cPreferredCustFlag"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cBirthDay"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="cBirthMonth"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="cBirthYear"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="cBirthCountry"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cLogin"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cEmailAddress"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cLastReviewDate"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cCurrentAddrSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cCurrentCdemoSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cFirstSalesDateSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cFirstShiptoDateSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="cCurrentHdemoSk"
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
  form: "customer",
  enableReinitialize: true,
  keepDirtyOnReinitialize: true,
})(Form);
