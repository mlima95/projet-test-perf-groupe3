import React, { Component } from "react";
import { connect } from "react-redux";
import { Link, Redirect } from "react-router-dom";
import PropTypes from "prop-types";
import { retrieve, reset } from "../../actions/customer/show";
import { del } from "../../actions/customer/delete";

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
                <th scope="row">cCustomerId</th>
                <td>{item["cCustomerId"]}</td>
              </tr>
              <tr>
                <th scope="row">cSalutation</th>
                <td>{item["cSalutation"]}</td>
              </tr>
              <tr>
                <th scope="row">cFirstName</th>
                <td>{item["cFirstName"]}</td>
              </tr>
              <tr>
                <th scope="row">cLastName</th>
                <td>{item["cLastName"]}</td>
              </tr>
              <tr>
                <th scope="row">cPreferredCustFlag</th>
                <td>{item["cPreferredCustFlag"]}</td>
              </tr>
              <tr>
                <th scope="row">cBirthDay</th>
                <td>{item["cBirthDay"]}</td>
              </tr>
              <tr>
                <th scope="row">cBirthMonth</th>
                <td>{item["cBirthMonth"]}</td>
              </tr>
              <tr>
                <th scope="row">cBirthYear</th>
                <td>{item["cBirthYear"]}</td>
              </tr>
              <tr>
                <th scope="row">cBirthCountry</th>
                <td>{item["cBirthCountry"]}</td>
              </tr>
              <tr>
                <th scope="row">cLogin</th>
                <td>{item["cLogin"]}</td>
              </tr>
              <tr>
                <th scope="row">cEmailAddress</th>
                <td>{item["cEmailAddress"]}</td>
              </tr>
              <tr>
                <th scope="row">cLastReviewDate</th>
                <td>{item["cLastReviewDate"]}</td>
              </tr>
              <tr>
                <th scope="row">cCurrentAddrSk</th>
                <td>{item["cCurrentAddrSk"]}</td>
              </tr>
              <tr>
                <th scope="row">cCurrentCdemoSk</th>
                <td>{item["cCurrentCdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">cFirstSalesDateSk</th>
                <td>{item["cFirstSalesDateSk"]}</td>
              </tr>
              <tr>
                <th scope="row">cFirstShiptoDateSk</th>
                <td>{item["cFirstShiptoDateSk"]}</td>
              </tr>
              <tr>
                <th scope="row">cCurrentHdemoSk</th>
                <td>{item["cCurrentHdemoSk"]}</td>
              </tr>
            </tbody>
          </table>
        )}
        <Link to=".." className="btn btn-primary">
          Back to list
        </Link>
        {item && (
          <Link to={`/customers/edit/${encodeURIComponent(item["@id"])}`}>
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
  retrieved: state.customer.show.retrieved,
  error: state.customer.show.error,
  loading: state.customer.show.loading,
  eventSource: state.customer.show.eventSource,
  deleteError: state.customer.del.error,
  deleteLoading: state.customer.del.loading,
  deleted: state.customer.del.deleted,
});

const mapDispatchToProps = (dispatch) => ({
  retrieve: (id) => dispatch(retrieve(id)),
  del: (item) => dispatch(del(item)),
  reset: (eventSource) => dispatch(reset(eventSource)),
});

export default connect(mapStateToProps, mapDispatchToProps)(Show);
