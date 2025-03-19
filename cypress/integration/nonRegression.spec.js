describe("Non-régression - Gestion de tâches", () => {
  beforeEach(() => {
    cy.visit(
      "https://crm.akov-formation.fr/datas/upload/fj/cv/r8/vsdkBRCemP.html"
    );
  });

  it("Vérifie le workflow existant", () => {
    cy.get("#taskInput").type("Tâche existante");
    cy.contains("Ajouter").click();
    cy.contains("Tâche existante").should("be.visible");
    cy.contains("Tâche existante").parent().contains("Supprimer").click();
    cy.contains("Tâche existante").should("not.exist");
  });

  it("Vérifie l’ajout de plusieurs tâches", () => {
    cy.get("#taskInput").type("Tâche 1");
    cy.contains("Ajouter").click();
    cy.get("#taskInput").type("Tâche 2");
    cy.contains("Ajouter").click();
    cy.contains("Tâche 1").should("be.visible");
    cy.contains("Tâche 2").should("be.visible");
    cy.contains("Tâche 1").parent().contains("Supprimer").click();
    cy.contains("Tâche 1").should("not.exist");
    cy.contains("Tâche 2").parent().contains("Supprimer").click();
    cy.contains("Tâche 2").should("not.exist");
  });
});
