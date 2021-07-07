import React, { Component } from "react";
import { connect } from "react-redux";
import { Link, Redirect } from "react-router-dom";
import PropTypes from "prop-types";
import { retrieve, reset } from "../../actions/catalogreturns/show";
import { del } from "../../actions/catalogreturns/delete";

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
                <th scope="row">crReturnQuantity</th>
                <td>{item["crReturnQuantity"]}</td>
              </tr>
              <tr>
                <th scope="row">crReturnAmount</th>
                <td>{item["crReturnAmount"]}</td>
              </tr>
              <tr>
                <th scope="row">crReturnTax</th>
                <td>{item["crReturnTax"]}</td>
              </tr>
              <tr>
                <th scope="row">crReturnAmtIncTax</th>
                <td>{item["crReturnAmtIncTax"]}</td>
              </tr>
              <tr>
                <th scope="row">crFee</th>
                <td>{item["crFee"]}</td>
              </tr>
              <tr>
                <th scope="row">crReturnShipCost</th>
                <td>{item["crReturnShipCost"]}</td>
              </tr>
              <tr>
                <th scope="row">crRefundedCash</th>
                <td>{item["crRefundedCash"]}</td>
              </tr>
              <tr>
                <th scope="row">crReversedCharge</th>
                <td>{item["crReversedCharge"]}</td>
              </tr>
              <tr>
                <th scope="row">crStoreCredit</th>
                <td>{item["crStoreCredit"]}</td>
              </tr>
              <tr>
                <th scope="row">crNetLoss</th>
                <td>{item["crNetLoss"]}</td>
              </tr>
              <tr>
                <th scope="row">crRefundedAddrSk</th>
                <td>{item["crRefundedAddrSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crReturningAddrSk</th>
                <td>{item["crReturningAddrSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crRefundedCustomerSk</th>
                <td>
                  {this.renderLinks("customers", item["crRefundedCustomerSk"])}
                </td>
              </tr>
              <tr>
                <th scope="row">crReturningCustomerSk</th>
                <td>
                  {this.renderLinks("customers", item["crReturningCustomerSk"])}
                </td>
              </tr>
              <tr>
                <th scope="row">crCallCenterSk</th>
                <td>
                  {this.renderLinks("call_centers", item["crCallCenterSk"])}
                </td>
              </tr>
              <tr>
                <th scope="row">crRefundedCdemoSk</th>
                <td>{item["crRefundedCdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crReturningCdemoSk</th>
                <td>{item["crReturningCdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crCatalogPageSk</th>
                <td>
                  {this.renderLinks("catalog_pages", item["crCatalogPageSk"])}
                </td>
              </tr>
              <tr>
                <th scope="row">crReturnedDateSk</th>
                <td>{item["crReturnedDateSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crRefundedHdemoSk</th>
                <td>{item["crRefundedHdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crReturningHdemoSk</th>
                <td>{item["crReturningHdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crItemSk</th>
                <td>{item["crItemSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crReasonSk</th>
                <td>{item["crReasonSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crShipModeSk</th>
                <td>{item["crShipModeSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crReturnedTimeSk</th>
                <td>{item["crReturnedTimeSk"]}</td>
              </tr>
              <tr>
                <th scope="row">crWarehouseSk</th>
                <td>{item["crWarehouseSk"]}</td>
              </tr>
            </tbody>
          </table>
        )}
        <Link to=".." className="btn btn-primary">
          Back to list
        </Link>
        {item && (
          <Link to={`/catalog_returns/edit/${encodeURIComponent(item["@id"])}`}>
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
  retrieved: state.catalogreturns.show.retrieved,
  error: state.catalogreturns.show.error,
  loading: state.catalogreturns.show.loading,
  eventSource: state.catalogreturns.show.eventSource,
  deleteError: state.catalogreturns.del.error,
  deleteLoading: state.catalogreturns.del.loading,
  deleted: state.catalogreturns.del.deleted,
});

const mapDispatchToProps = (dispatch) => ({
  retrieve: (id) => dispatch(retrieve(id)),
  del: (item) => dispatch(del(item)),
  reset: (eventSource) => dispatch(reset(eventSource)),
});

export default connect(mapStateToProps, mapDispatchToProps)(Show);
