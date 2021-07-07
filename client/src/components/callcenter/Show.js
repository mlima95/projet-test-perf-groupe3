import React, { Component } from "react";
import { connect } from "react-redux";
import { Link, Redirect } from "react-router-dom";
import PropTypes from "prop-types";
import { retrieve, reset } from "../../actions/callcenter/show";
import { del } from "../../actions/callcenter/delete";

class Show extends Component {
  static propTypes = {
    retrieved: PropTypes.object,
    loading: PropTypes.bool.isRequired,
    error: PropTypes.string,
    eventSource: PropTypes.instanceOf(EventSource),
    retrieve: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
    deleteError: PropTypes.string,
    deleteLoading: PropTypes.bool.isRequired,
    deleted: PropTypes.object,
    del: PropTypes.func.isRequired,
  };

  componentDidMount() {
    this.props.retrieve(decodeURIComponent(this.props.match.params.id));
  }

  componentWillUnmount() {
    this.props.reset(this.props.eventSource);
  }

  del = () => {
    if (window.confirm("Are you sure you want to delete this item?"))
      this.props.del(this.props.retrieved);
  };

  render() {
    if (this.props.deleted) return <Redirect to=".." />;

    const item = this.props.retrieved;

    return (
      <div>
        <h1>Show {item && item["@id"]}</h1>

        {this.props.loading && (
          <div className="alert alert-info" role="status">
            Loading...
          </div>
        )}
        {this.props.error && (
          <div className="alert alert-danger" role="alert">
            <span className="fa fa-exclamation-triangle" aria-hidden="true" />{" "}
            {this.props.error}
          </div>
        )}
        {this.props.deleteError && (
          <div className="alert alert-danger" role="alert">
            <span className="fa fa-exclamation-triangle" aria-hidden="true" />{" "}
            {this.props.deleteError}
          </div>
        )}

        {item && (
          <table className="table table-responsive table-striped table-hover">
            <thead>
              <tr>
                <th>Field</th>
                <th>Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">ccCallCenterId</th>
                <td>{item["ccCallCenterId"]}</td>
              </tr>
              <tr>
                <th scope="row">ccRecStartDate</th>
                <td>{item["ccRecStartDate"]}</td>
              </tr>
              <tr>
                <th scope="row">ccRecEndDate</th>
                <td>{item["ccRecEndDate"]}</td>
              </tr>
              <tr>
                <th scope="row">ccName</th>
                <td>{item["ccName"]}</td>
              </tr>
              <tr>
                <th scope="row">ccClass</th>
                <td>{item["ccClass"]}</td>
              </tr>
              <tr>
                <th scope="row">ccEmployees</th>
                <td>{item["ccEmployees"]}</td>
              </tr>
              <tr>
                <th scope="row">ccSqFt</th>
                <td>{item["ccSqFt"]}</td>
              </tr>
              <tr>
                <th scope="row">ccHours</th>
                <td>{item["ccHours"]}</td>
              </tr>
              <tr>
                <th scope="row">ccManager</th>
                <td>{item["ccManager"]}</td>
              </tr>
              <tr>
                <th scope="row">ccMktId</th>
                <td>{item["ccMktId"]}</td>
              </tr>
              <tr>
                <th scope="row">ccMktClass</th>
                <td>{item["ccMktClass"]}</td>
              </tr>
              <tr>
                <th scope="row">ccMktDesc</th>
                <td>{item["ccMktDesc"]}</td>
              </tr>
              <tr>
                <th scope="row">ccMarketManager</th>
                <td>{item["ccMarketManager"]}</td>
              </tr>
              <tr>
                <th scope="row">ccDivision</th>
                <td>{item["ccDivision"]}</td>
              </tr>
              <tr>
                <th scope="row">ccDivisionName</th>
                <td>{item["ccDivisionName"]}</td>
              </tr>
              <tr>
                <th scope="row">ccCompany</th>
                <td>{item["ccCompany"]}</td>
              </tr>
              <tr>
                <th scope="row">ccCompanyName</th>
                <td>{item["ccCompanyName"]}</td>
              </tr>
              <tr>
                <th scope="row">ccStreetNumber</th>
                <td>{item["ccStreetNumber"]}</td>
              </tr>
              <tr>
                <th scope="row">ccStreetName</th>
                <td>{item["ccStreetName"]}</td>
              </tr>
              <tr>
                <th scope="row">ccStreetType</th>
                <td>{item["ccStreetType"]}</td>
              </tr>
              <tr>
                <th scope="row">ccSuiteNumber</th>
                <td>{item["ccSuiteNumber"]}</td>
              </tr>
              <tr>
                <th scope="row">ccCity</th>
                <td>{item["ccCity"]}</td>
              </tr>
              <tr>
                <th scope="row">ccCounty</th>
                <td>{item["ccCounty"]}</td>
              </tr>
              <tr>
                <th scope="row">ccState</th>
                <td>{item["ccState"]}</td>
              </tr>
              <tr>
                <th scope="row">ccZip</th>
                <td>{item["ccZip"]}</td>
              </tr>
              <tr>
                <th scope="row">ccCountry</th>
                <td>{item["ccCountry"]}</td>
              </tr>
              <tr>
                <th scope="row">ccGmtOffset</th>
                <td>{item["ccGmtOffset"]}</td>
              </tr>
              <tr>
                <th scope="row">ccTaxPercentage</th>
                <td>{item["ccTaxPercentage"]}</td>
              </tr>
              <tr>
                <th scope="row">ccClosedDateSk</th>
                <td>{item["ccClosedDateSk"]}</td>
              </tr>
              <tr>
                <th scope="row">ccOpenDateSk</th>
                <td>{item["ccOpenDateSk"]}</td>
              </tr>
            </tbody>
          </table>
        )}
        <Link to=".." className="btn btn-primary">
          Back to list
        </Link>
        {item && (
          <Link to={`/call_centers/edit/${encodeURIComponent(item["@id"])}`}>
            <button className="btn btn-warning">Edit</button>
          </Link>
        )}
        <button onClick={this.del} className="btn btn-danger">
          Delete
        </button>
      </div>
    );
  }

  renderLinks = (type, items) => {
    if (Array.isArray(items)) {
      return items.map((item, i) => (
        <div key={i}>{this.renderLinks(type, item)}</div>
      ));
    }

    return (
      <Link to={`../../${type}/show/${encodeURIComponent(items)}`}>
        {items}
      </Link>
    );
  };
}

const mapStateToProps = (state) => ({
  retrieved: state.callcenter.show.retrieved,
  error: state.callcenter.show.error,
  loading: state.callcenter.show.loading,
  eventSource: state.callcenter.show.eventSource,
  deleteError: state.callcenter.del.error,
  deleteLoading: state.callcenter.del.loading,
  deleted: state.callcenter.del.deleted,
});

const mapDispatchToProps = (dispatch) => ({
  retrieve: (id) => dispatch(retrieve(id)),
  del: (item) => dispatch(del(item)),
  reset: (eventSource) => dispatch(reset(eventSource)),
});

export default connect(mapStateToProps, mapDispatchToProps)(Show);
