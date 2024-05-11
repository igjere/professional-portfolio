/**
 * FamilyContactController is a Java class containing method to run FXML file "FamilyContactView".
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */

package application.controller;

import java.io.IOException;
import java.util.Comparator;

import application.Main;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.shape.Rectangle;
import javafx.scene.Scene;
import javafx.scene.layout.AnchorPane;
import application.model.User;
import application.model.AddressBook;
import application.model.Contact;
import javafx.scene.paint.Color;
import javafx.scene.paint.Paint;

public class FamilyContactController {

    @FXML
    private Button backButton;

    @FXML
    private Label contactLabel;

    @FXML
    private TableView<Contact> contactTableView;
    
    private ObservableList<Contact> contacts = FXCollections.observableArrayList();

    @FXML
    private Button logoutButton;

    @FXML
    private Rectangle userBackground;

    @FXML
    private Label usernameLabel;
    
	/* Initializes scene */
	public void initialize() throws IOException {}
	public void initData(User user) throws IOException {
		String favColor1 = user.getFavoriteColor1().toUpperCase().replaceAll("\\s", "");
		userBackground.setStyle("-fx-fill: " + favColor1 +";");
		String favColor2 = user.getFavoriteColor2().toUpperCase().replaceAll("\\s", "");
		contactLabel.setStyle("-fx-text-fill: " + favColor2 +";");
		String fullname = user.getFullName();
		String username = user.getUsername();
		contactLabel.setText(fullname);
		usernameLabel.setText(username);
		
		
        TableColumn<Contact, String> name = new TableColumn<Contact, String>("Name");
        TableColumn<Contact, String> relation = new TableColumn<Contact, String>("Relation");
        TableColumn<Contact, String> location = new TableColumn<Contact, String>("Location");
        TableColumn<Contact, String> phone = new TableColumn<Contact, String>("Phone");
		AddressBook familyBook = new AddressBook("Family Contacts");
		contacts = familyBook.loadContacts("data/family-" + username + ".csv", fullname);
		
		//For extra credit
		if(contacts!=null) {
			Comparator<Contact> comparator = Comparator.comparing(Contact::getLastName).thenComparing(Contact::getFirstName);
			contacts.sort(comparator);
		}
		
		name.setCellValueFactory(new PropertyValueFactory<Contact, String>("name"));
		relation.setCellValueFactory(new PropertyValueFactory<Contact, String>("relationship"));
		location.setCellValueFactory(new PropertyValueFactory<Contact, String>("location"));
		phone.setCellValueFactory(new PropertyValueFactory<Contact, String>("phoneNumber"));
		
        contactTableView.getColumns().addAll(name, relation, location, phone);
        contactTableView.setItems(contacts);
	}

	//Sends back to user
    @FXML
    void backPressed(ActionEvent event) {
		try {
			FXMLLoader loader = new FXMLLoader(); 
    		loader.setLocation(Main.class.getResource("view/UserView.fxml"));
    		UserController controller = new UserController();
    		loader.setController(controller);
    		AnchorPane layout = (AnchorPane) loader.load();
    		Scene scene = new Scene(layout);
    		Main.stage.setScene(scene);
    		Main.stage.setTitle("User View");
    		String username = usernameLabel.getText();
    		User user = User.loadUser(username);
    		controller.initData(user);
    		Main.stage.show();
		}
		catch(Exception e) {
			e.printStackTrace();
		}
    }

    //Sends back to login
    @FXML
    void logoutPressed(ActionEvent event) {
		try {
			FXMLLoader loader = new FXMLLoader(); 
    		loader.setLocation(Main.class.getResource("view/Login.fxml"));
    		LoginController controller = new LoginController();
    		loader.setController(controller);
    		AnchorPane layout = (AnchorPane) loader.load();
    		Scene scene = new Scene(layout);
    		Main.stage.setScene(scene);
    		Main.stage.setTitle("Login View");
    		Main.stage.show();
		}
		catch(Exception e) {
			e.printStackTrace();
		}
    }

}
