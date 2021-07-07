import React, { Component } from "react";
import { connect } from "react-redux";
import { Link } from "react-router-dom";
import PropTypes from "prop-types";
import { list, reset } from "../../actions/catalogreturns/list";

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
        <h1>CatalogReturns List</h1>

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
              <th>crReturnQuantity</th>
              <th>crReturnAmount</th>
              <th>crReturnTax</th>
              <th>crReturnAmtIncTax</th>
              <th>crFee</th>
              <th>crReturnShipCost</th>
              <th>crRefundedCash</th>
              <th>crReversedCharge</th>
              <th>crStoreCredit</th>
              <th>crNetLoss</th>
              <th>crRefundedAddrSk</th>
              <th>crReturningAddrSk</th>
              <th>crRefundedCustomerSk</th>
              <th>crReturningCustomerSk</th>
              <th>crCallCenterSk</th>
              <th>crRefundedCdemoSk</th>
              <th>crReturningCdemoSk</th>
              <th>crCatalogPageSk</th>
              <th>crReturnedDateSk</th>
              <th>crRefundedHdemoSk</th>
              <th>crReturningHdemoSk</th>
              <th>crItemSk</th>
              <th>crReasonSk</th>
              <th>crShipModeSk</th>
              <th>crReturnedTimeSk</th>
              <th>crWarehouseSk</th>
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
                  <td>{item["crReturnQuantity"]}</td>
                  <td>{item["crReturnAmount"]}</td>
                  <td>{item["crReturnTax"]}</td>
                  <td>{item["crReturnAmtIncTax"]}</td>
                  <td>{item["crFee"]}</td>
                  <td>{item["crReturnShipCost"]}</td>
                  <td>{item["crRefundedCash"]}</td>
                  <td>{item["crReversedCharge"]}</td>
                  <td>{item["crStoreCredit"]}</td>
                  <td>{item["crNetLoss"]}</td>
                  <td>{item["crRefundedAddrSk"]}</td>
                  <td>{item["crReturningAddrSk"]}</td>
                  <td>
                    {this.renderLinks(
                      "customers",
                      item["crRefundedCustomerSk"]
                    )}
                  </td>
                  <td>
                    {this.renderLinks(
                      "customers",
                      item["crReturningCustomerSk"]
                    )}
                  </td>
                  <td>
                    {this.renderLinks("call_centers", item["crCallCenterSk"])}
                  </td>
                  <td>{item["crRefundedCdemoSk"]}</td>
                  <td>{item["crReturningCdemoSk"]}</td>
                  <td>
                    {this.renderLinks("catalog_pages", item["crCatalogPageSk"])}
                  </td>
                  <td>{item["crReturnedDateSk"]}</td>
                  <td>{item["crRefundedHdemoSk"]}</td>
                  <td>{item["crReturningHdemoSk"]}</td>
                  <td>{item["crItemSk"]}</td>
                  <td>{item["crReasonSk"]}</td>
                  <td>{item["crShipModeSk"]}</td>
                  <td>{item["crReturnedTimeSk"]}</td>
                  <td>{item["crWarehouseSk"]}</td>
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
    state.catalogreturns.list;
  return { retrieved, loading, error, eventSource, deletedItem };
};

const mapDispatchToProps = (dispatch) => ({
  list: (page) => dispatch(list(page)),
  reset: (eventSource) => dispatch(reset(eventSource)),
});

export default connect(mapStateToProps, mapDispatchToProps)(List);
