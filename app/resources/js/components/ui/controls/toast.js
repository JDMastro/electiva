
export function Toast({ msg }) {
    return (
        <div aria-live="polite" aria-atomic="true" className="d-flex w-100">

            <div id="EpicToast" className="toast" role="alert" aria-live="assertive" aria-atomic="true" style={{ position: "absolute", bottom: "5%", right: "1%", zIndex: 9999, float: "right" }}>
                <div className="toast-header">
                    <strong className="me-auto">Bootstrap</strong>
                    <small className="text-muted">Now</small>
                    <button type="button" className="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div className="toast-body">
                    {msg}
                </div>
            </div>
        </div>
    )
}