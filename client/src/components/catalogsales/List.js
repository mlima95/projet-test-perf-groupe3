import React, { Component } from "react";
import { connect } from "react-redux";
import { Link } from "react-router-dom";
import PropTypes from "prop-types";
import { list, reset } from "../../actions/catalogsales/list";

class List extends Component {
  static propTypes = {
    retrieved: PropTypes.object,
    loading: PropTypes.bool.isRequired,
    error: PropTypes.string,
    eventSource: PropTypes.instanceOf(EventSource),
    deletedItem: PropTypes.object,
    list: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
  };

  componentDidMount() {
    this.props.list(
      this.props.match.params.page &&
        decodeURIComponent(this.props.match.params.page)
    );
  }

  componentDidUpdate(prevProps) {
    if (this.props.match.params.page !== prevProps.match.params.page)
      this.props.list(
        this.props.match.params.page &&
          decodeURIComponent(this.props.match.params.page)
      );
  }

  componentWillUnmount() {
    this.props.reset(this.props.eventSource);
  }

  render() {
    return (
      <div>
        <h1>CatalogSales List</h1>

        {this.props.loading && (
          <div className="alert alert-info">Loading...</div>
        )}
        {this.props.deletedItem && (
          <div className="alert alert-success">
            {this.props.deletedItem["@id"]} deleted.
          </div>
        )}
        {this.props.error && (
          <div className="alert alert-danger">{this.props.error}</div>
        )}

        <p>
          <Link to="create" className="btn btn-primary">
            Create
          </Link>
        </p>

        <table className="table table-responsive table-striped table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>csQuantity</th>
              <th>csWholesaleCost</th>
              <th>csListPrice</th>
              <th>csSalesPrice</th>
              <th>csExtDiscountAmt</th>
              <th>csExtSalesPrice</th>
              <th>csExtWholesaleCost</th>
              <th>csExtListPrice</th>
              <th>csExtTax</th>
              <th>csCouponAmt</th>
              <th>csExtShipCost</th>
              <th>csNetPaid</th>
              <th>csNetPaidIncTax</th>
              <th>csNetPaidIncShip</th>
              <th>csNetPaidIncShipTax</th>
              <th>csNetProfit</th>
              <th>csBillAddrSk</th>
              <th>csBillCustomerSk</th>
              <th>csBillCdemoSk</th>
              <th>csBillHdemoSk</th>
              <th>csCallCenterSk</th>
              <th>csCatalogPageSk</th>
              <th>csShipDateSk</th>
              <th>csSoldDateSk</th>
              <th>csItemSk</th>
              <th>csPromoSk</th>
              <th>csShipAddrSk</th>
              <th>csShipCustomerSk</th>
              <th>csShipCdemoSk</th>
              <th>csShipHdemoSk</th>
              <th>csShipModeSk</th>
              <th>csSoldTimeSk</th>
              <th>csWarehouseSk</th>
              <th colSpan={2} />
            </tr>
          </thead>
          <tbody>
            {this.props.retrieved &&
              this.props.retrieved["hydra:member"].map((item) => (
                <tr key={item["@id"]}>
                  <th scope="row">
                    <Link to={`show/${encodeURIComponent(item["@id"])}`}>
                      {item["@id"]}
                    </Link>
                  </th>
                  <td>{item["csQuantity"]}</td>
                  <td>{item["csWholesaleCost"]}</td>
                  <td>{item["csListPrice"]}</td>
                  <td>{item["csSalesPrice"]}</td>
                  <td>{item["csExtDiscountAmt"]}</td>
                  <td>{item["csExtSalesPrice"]}</td>
                  <td>{item["csExtWholesaleCost"]}</td>
                  <td>{item["csExtListPrice"]}</td>
                  <td>{item["csExtTax"]}</td>
                  <td>{item["csCouponAmt"]}</td>
                  <td>{item["csExtShipCost"]}</td>
                  <td>{item["csNetPaid"]}</td>
                  <td>{item["csNetPaidIncTax"]}</td>
                  <td>{item["csNetPaidIncShip"]}</td>
                  <td>{item["csNetPaidIncShipTax"]}</td>
                  <td>{item["csNetProfit"]}</td>
                  <td>{item["csBillAddrSk"]}</td>
                  <td>
                    {this.renderLinks("customers", item["csBillCustomerSk"])}
                  </td>
                  <td>{item["csBillCdemoSk"]}</td>
                  <td>{item["csBillHdemoSk"]}</td>
                  <td>
                    {this.renderLinks("call_centers", item["csCallCenterSk"])}
                  </td>
                  <td>
                    {this.renderLinks("catalog_pages", item["csCatalogPageSk"])}
                  </td>
                  <td>{item["csShipDateSk"]}</td>
                  <td>{item["csSoldDateSk"]}</td>
                  <td>{item["csItemSk"]}</td>
                  <td>{item["csPromoSk"]}</td>
                  <td>{item["csShipAddrSk"]}</td>
                  <td>
                    {this.renderLinks("customers", item["csShipCustomerSk"])}
                  </td>
                  <td>{item["csShipCdemoSk"]}</td>
                  <td>{item["csShipHdemoSk"]}</td>
                  <td>{item["csShipModeSk"]}</td>
                  <td>{item["csSoldTimeSk"]}</td>
                  <td>{item["csWarehouseSk"]}</td>
                  <td>
                    <Link to={`show/${encodeURIComponent(item["@id"])}`}>
                      <span className="fa fa-search" aria-hidden="true" />
                      <span className="sr-only">Show</span>
                    </Link>
                  </td>
                  <td>
                    <Link to={`edit/${encodeURIComponent(item["@id"])}`}>
                      <span className="fa fa-pencil" aria-hidden="true" />
                      <span className="sr-only">Edit</span>
                    </Link>
                  </td>
                </tr>
              ))}
          </tbody>
        </table>

        {this.pagination()}
      </div>
    );
  }

  pagination() {
    const view = this.props.retrieved && this.props.retrieved["hydra:view"];
    if (!view || !view["hydra:first"]) return;

    const {
      "hydra:first": first,
      "hydra:previous": previous,
      "hydra:next": next,
      "hydra:last": last,
    } = view;

    return (
      <nav aria-label="Page navigation">
        <Link
          to="."
          className={`btn btn-primary${previous ? "" : " disabled"}`}
        >
          <span aria-hidden="true">&lArr;</span> First
        </Link>
        <Link
          to={
            !previous || previous === first ? "." : encodeURIComponent(previous)
          }
          className={`btn btn-primary${previous ? "" : " disabled"}`}
        >
          <span aria-hidden="true">&larr;</span> Previous
        </Link>
        <Link
          to={next ? encodeURIComponent(next) : "#"}
          className={`btn btn-primary${next ? "" : " disabled"}`}
        >
          Next <span aria-hidden="true">&rarr;</span>
        </Link>
        <Link
          to={last ? encodeURIComponent(last) : "#"}
          className={`btn btn-primary${next ? "" : " disabled"}`}
        >
          Last <span aria-hidden="true">&rArr;</span>
        </Link>
      </nav>
    );
  }

  renderLinks = (type, items) => {
    if (Array.isArray(items)) {
      return items.map((item, i) => (
        <div key={i}>{this.renderLinks(type, item)}</div>
      ));
    }

    return (
      <Link to={`../${type}/show/${encodeURIComponent(items)}`}>{items}</Link>
    );
  };
}

const mapStateToProps = (state) => {
  const { retrieved, loading, error, eventSource, deletedItem } =
    state.catalogsales.list;
  return { retrieved, loading, error, eventSource, deletedItem };
};

const mapDispatchToProps = (dispatch) => ({
  list: (page) => dispatch(list(page)),
  reset: (eventSource) => dispatch(reset(eventSource)),
});

export default connect(mapStateToProps, mapDispatchToProps)(List);
