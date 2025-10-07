<div class="row">
  <!-- Update Logo Section -->
  <div class="col-xl-6 col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mt-0 header-title mb-3">Update Logo</h4>
        <p class="text-muted mb-4 font-13">
          Choose and upload a new logo. You can also keep the default image below.
        </p>
        <form action="#" method="post">
          <!-- File Upload Input -->
          <input
            type="file"
            id="input-file-now-custom-1"
            class="dropify"
            data-default-file="assets/images/logo.png" />

          <!-- Action Buttons -->
          <div class="text-end mt-4">
            <button type="reset" class="btn btn-secondary btn-sm me-2">
              <i class="mdi mdi-refresh me-1"></i> Reset
            </button>
            <button type="button" class="btn btn-primary btn-sm">
              <i class="mdi mdi-upload me-1"></i> Upload Logo
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Update Password Section -->
  <div class="col-xl-6 col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mt-0 header-title mb-3">Update Password</h4>
        <p class="text-muted mb-4 font-13">
          Enter your new password below and confirm it.
        </p>
        <form action="#" method="post">
          <div class="form-group">
            <div class="mb-3">
              <input
                type="password"
                id="pass2"
                class="form-control"
                required
                placeholder="New Password" />
            </div>
            <div>
              <input
                type="password"
                class="form-control"
                required
                data-parsley-equalto="#pass2"
                placeholder="Confirm Password" />
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="form-group mb-0 text-end mt-4">
            <button
              type="submit"
              class="btn btn-primary waves-effect waves-light me-2">
              <i class="fe-save me-1"></i> Update Password
            </button>
            <button
              type="reset"
              class="btn btn-secondary waves-effect">
              <i class="fe-x me-1"></i> Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>