// function previewImage() class .img-preview
function previewImage() {
  const image = document.querySelector("#image");
  const imgPreview = document.querySelector(".img-preview");

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}

// Input type checkbox - RolesController.create.edit field permissions
document.addEventListener("DOMContentLoaded", () => {
  const allPermissionCheckbox = document.querySelector(
    '[name="all_permission"]'
  );

  allPermissionCheckbox?.addEventListener("click", () => {
    document
      .querySelectorAll(".permission")
      .forEach(
        (checkbox) => (checkbox.checked = allPermissionCheckbox.checked)
      );
  });
});
