import React, { Component } from "react";
import { connect } from "react-redux";
import { Link, Redirect } from "react-router-dom";
import PropTypes from "prop-types";
import { retrieve, reset } from "../../actions/catalogsales/show";
import { del } from "../../actions/catalogsales/delete";

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
                <th scope="row">csQuantity</th>
                <td>{item["csQuantity"]}</td>
              </tr>
              <tr>
                <th scope="row">csWholesaleCost</th>
                <td>{item["csWholesaleCost"]}</td>
              </tr>
              <tr>
                <th scope="row">csListPrice</th>
                <td>{item["csListPrice"]}</td>
              </tr>
              <tr>
                <th scope="row">csSalesPrice</th>
                <td>{item["csSalesPrice"]}</td>
              </tr>
              <tr>
                <th scope="row">csExtDiscountAmt</th>
                <td>{item["csExtDiscountAmt"]}</td>
              </tr>
              <tr>
                <th scope="row">csExtSalesPrice</th>
                <td>{item["csExtSalesPrice"]}</td>
              </tr>
              <tr>
                <th scope="row">csExtWholesaleCost</th>
                <td>{item["csExtWholesaleCost"]}</td>
              </tr>
              <tr>
                <th scope="row">csExtListPrice</th>
                <td>{item["csExtListPrice"]}</td>
              </tr>
              <tr>
                <th scope="row">csExtTax</th>
                <td>{item["csExtTax"]}</td>
              </tr>
              <tr>
                <th scope="row">csCouponAmt</th>
                <td>{item["csCouponAmt"]}</td>
              </tr>
              <tr>
                <th scope="row">csExtShipCost</th>
                <td>{item["csExtShipCost"]}</td>
              </tr>
              <tr>
                <th scope="row">csNetPaid</th>
                <td>{item["csNetPaid"]}</td>
              </tr>
              <tr>
                <th scope="row">csNetPaidIncTax</th>
                <td>{item["csNetPaidIncTax"]}</td>
              </tr>
              <tr>
                <th scope="row">csNetPaidIncShip</th>
                <td>{item["csNetPaidIncShip"]}</td>
              </tr>
              <tr>
                <th scope="row">csNetPaidIncShipTax</th>
                <td>{item["csNetPaidIncShipTax"]}</td>
              </tr>
              <tr>
                <th scope="row">csNetProfit</th>
                <td>{item["csNetProfit"]}</td>
              </tr>
              <tr>
                <th scope="row">csBillAddrSk</th>
                <td>{item["csBillAddrSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csBillCustomerSk</th>
                <td>
                  {this.renderLinks("customers", item["csBillCustomerSk"])}
                </td>
              </tr>
              <tr>
                <th scope="row">csBillCdemoSk</th>
                <td>{item["csBillCdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csBillHdemoSk</th>
                <td>{item["csBillHdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csCallCenterSk</th>
                <td>
                  {this.renderLinks("call_centers", item["csCallCenterSk"])}
                </td>
              </tr>
              <tr>
                <th scope="row">csCatalogPageSk</th>
                <td>
                  {this.renderLinks("catalog_pages", item["csCatalogPageSk"])}
                </td>
              </tr>
              <tr>
                <th scope="row">csShipDateSk</th>
                <td>{item["csShipDateSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csSoldDateSk</th>
                <td>{item["csSoldDateSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csItemSk</th>
                <td>{item["csItemSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csPromoSk</th>
                <td>{item["csPromoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csShipAddrSk</th>
                <td>{item["csShipAddrSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csShipCustomerSk</th>
                <td>
                  {this.renderLinks("customers", item["csShipCustomerSk"])}
                </td>
              </tr>
              <tr>
                <th scope="row">csShipCdemoSk</th>
                <td>{item["csShipCdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csShipHdemoSk</th>
                <td>{item["csShipHdemoSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csShipModeSk</th>
                <td>{item["csShipModeSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csSoldTimeSk</th>
                <td>{item["csSoldTimeSk"]}</td>
              </tr>
              <tr>
                <th scope="row">csWarehouseSk</th>
                <td>{item["csWarehouseSk"]}</td>
              </tr>
            </tbody>
          </table>
        )}
        <Link to=".." className="btn btn-primary">
          Back to list
        </Link>
        {item && (
          <Link to={`/catalog_sales/edit/${encodeURIComponent(item["@id"])}`}>
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
  retrieved: state.catalogsales.show.retrieved,
  error: state.catalogsales.show.error,
  loading: state.catalogsales.show.loading,
  eventSource: state.catalogsales.show.eventSource,
  deleteError: state.catalogsales.del.error,
  deleteLoading: state.catalogsales.del.loading,
  deleted: state.catalogsales.del.deleted,
});

const mapDispatchToProps = (dispatch) => ({
  retrieve: (id) => dispatch(retrieve(id)),
  del: (item) => dispatch(del(item)),
  reset: (eventSource) => dispatch(reset(eventSource)),
});

export default connect(mapStateToProps, mapDispatchToProps)(Show);
