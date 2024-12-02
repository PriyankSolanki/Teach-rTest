import React, { useEffect, useRef, useState } from "react";
import { Dialog } from "primereact/dialog";
import { Button } from "primereact/button";
import { InputTextarea } from "primereact/inputtextarea";
import { InputNumber } from "primereact/inputnumber";
import { fetchCategories } from "@/api/apiCategories";
import { Dropdown, DropdownChangeEvent } from "primereact/dropdown";
import { addProduits, deleteProduits, fetchProduits } from "@/api/apiProduits";
import axios from "axios";
import { Toast } from "primereact/toast";



interface ProductTableProps {
    closeDialog: () => void; 
    visible:boolean;
    setProduits: (data:any) => void;
    selectedProduit:any;
}

const deleteProductDialog : React.FC<ProductTableProps> = ({ visible, closeDialog, setProduits, selectedProduit }) => {
  const [produit, setProduct] = useState({ nom: selectedProduit.nom, description: selectedProduit.description, prix:selectedProduit.prix, idCategorie: selectedProduit.categorie?.id || null });
  const toast = useRef<Toast>(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const handleDeleteProduct = async () => { 
        try {
            const response = await deleteProduits(selectedProduit.id);
            if(toast.current){
                toast.current?.show({
                    severity: "success",
                    summary: "Succès",
                    detail: "Produit supprimé avec succès !",
                  });
            }
            try {
                const data = await fetchProduits();
                setProduits(data); 
                setLoading(false);
              } catch (err) {
                setError("Impossible de récupérer les produits.");
                setLoading(false);
              }
          } catch (error : unknown) {
            const messageError = document.getElementById("errorMessage");
            if (axios.isAxiosError(error)) {
                if (error.response) {
                    if (messageError) {
                        messageError.classList.add("visible"); 
                        messageError.textContent = error.response.data.message;
                    }
                } else if (error.request) {
                  console.error("Erreur réseau :", error.request);
                  setError("Erreur réseau : Impossible de joindre le serveur.");
                } else {
                  console.error("Erreur inattendue :", error.message);
                  setError(`Erreur inattendue : ${error.message}`);
                }
              } else {
                console.error("Erreur non capturée :", error);
                setError("Erreur inconnue.");
              }
          }
        closeDialog();
    
  };


  return (<>
    <Toast ref={toast} />
    <Dialog header="Supprimer un produit" visible={visible}  style={{ width: "50vw" }} onHide={closeDialog}>
    <p style={{color:"red"}} id="errorMessage"></p>
      <div className="p-fluid">
        <div className="field">
            <p>Nom : <strong>{selectedProduit.nom}</strong></p>
        </div>
        <div className="field">
            <p>Description : <strong>{selectedProduit.description}</strong></p>
        </div>
        <div className="field">
            <p>Prix : <strong>{selectedProduit.prix} €</strong></p>
        </div>
        <div className="field">
            <p>Catégorie : <strong>{selectedProduit.categorie?.nom|| "Aucune catégorie"}</strong></p>
        </div>
        <div className="field">
            <p>Date de création : <strong>{new Date(selectedProduit.dateCreation).toLocaleDateString("fr-FR")}</strong></p>
        </div>
      </div>
        <Button label="Annuler" className="p-button-text" style={{ color: "red" }} onClick={closeDialog} />
        <Button label="Supprimer" className="p-button-danger" onClick={handleDeleteProduct} />
    </Dialog></>
  );
};

export default deleteProductDialog;
