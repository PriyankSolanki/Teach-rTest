import React, { useState } from "react";
import ProduitsTable from "./produitsTable";
import AddProduitDialog from "./addProduitDialog";
import UpdateProduitDialog from "./updateProduitDialog";
import DeleteProduitDialog from "./deleteProduitDialog";

const ProduitsManager = () => {
    //produits
    const [produits, setProduits] = useState([]);
    //add
    const [addDialog, setAddDialog] = useState(false);
    const openAddDialog = () => setAddDialog(true);
    const closeAddDialog = () => setAddDialog(false); 
    //update
    const [updateDialog, setUpdateDialog] = useState(false);
    const [selectedProduitUpdate, setSelectedProduitUpdate] = useState(null);
    const openUpdateDialog = (produit:any) => {
        setUpdateDialog(true);
        setSelectedProduitUpdate(produit);
    }
    const closeUpdateDialog = () => setUpdateDialog(false)
    //delete
    const [deleteDialog, setDeleteDialog] = useState(false);
    const [selectedProduitDelete, setSelectedProduitDelete] = useState(null);
    const openDeleteDialog = (produit:any) => {
        setDeleteDialog(true);
        setSelectedProduitDelete(produit);
    }
    const closeDeleteDialog = () => setDeleteDialog(false);
    
    

  return (
    <div>
      {/* Bouton dans le tableau */}
      <ProduitsTable openAddDialog={openAddDialog} openUpdateDialog={openUpdateDialog} openDeleteDialog={openDeleteDialog} setProduits={setProduits}  produits={produits}/>

      {/* Dialogue dans un autre composant */}
      <AddProduitDialog visible={addDialog} closeDialog={closeAddDialog} setProduits={setProduits} />
      {updateDialog && selectedProduitUpdate&&(<UpdateProduitDialog visible={updateDialog} selectedProduit={selectedProduitUpdate} closeDialog={closeUpdateDialog} setProduits={setProduits} />)}

      {selectedProduitDelete &&(<DeleteProduitDialog visible={deleteDialog} selectedProduit={selectedProduitDelete} closeDialog={closeDeleteDialog} setProduits={setProduits} />)}
    </div>
  );
};

export default ProduitsManager;
