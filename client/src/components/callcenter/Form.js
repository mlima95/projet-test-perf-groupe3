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
          htmlFor={`callcenter_${data.input.name}`}
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
          id={`callcenter_${data.input.name}`}
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
          name="ccCallCenterId"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccRecStartDate"
          type="dateTime"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccRecEndDate"
          type="dateTime"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccName"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccClass"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccEmployees"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="ccSqFt"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="ccHours"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccManager"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccMktId"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="ccMktClass"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccMktDesc"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccMarketManager"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccDivision"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="ccDivisionName"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccCompany"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="ccCompanyName"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccStreetNumber"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccStreetName"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccStreetType"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccSuiteNumber"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccCity"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccCounty"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccState"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccZip"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccCountry"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccGmtOffset"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccTaxPercentage"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccClosedDateSk"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="ccOpenDateSk"
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
  form: "callcenter",
  enableReinitialize: true,
  keepDirtyOnReinitialize: true,
})(Form);
