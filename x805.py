#
#
#  AWS LEX - X805 Decision Tree 
#
#  Z.Levine
#
#  Particulars of X.805 are published in:
#  INTERNATIONAL TELECOMMUNICATION UNION - ITU RECOMMENDATION X.805 - 10/2003 - https://www.itu.int/rec/T-REC-X.805-200310-I/en



layer = str(input("In what SECURITY LAYER does your application function?: "))

plane = str(input("In what SECURITY PLANE does your application function?: "))

if layer == "applications" and plane == "end-user":

    
    print ("Access Control: Ensure that only authorized users and devices are allowed to access and use the network-based application.", "\n"*2, "Authentication: Verify the identity of the user or device attempting to access and use the network-based application. Authentication techniques may be required as part of access control. ", "\n"*2, "Non-Repudiation: Provide a record identifying each user or device that accessed and used the network-based application and the action that was performed. This record is to be used as proof of access to and use of the application by the end-user or device. ", "\n"*2, "Data Confidentiality: Protect end-user data (e.g., a user's credit card number) that is being transported by, processed by, or stored by a network-based application against unauthorized access or viewing. The same types of considerations are applied to user data as it flows from the user to the network-based application. Techniques used to address access control may contribute to providing data confidentiality for end-user data. ", "\n"*2, "Communication Security: Ensure that end-user data that is being transported by, processed by, or stored by a network-based application is not diverted or intercepted as it flows between these endpoints without authorized access (e.g., wiretaps). The same types of considerations are applied to user data as it flows from the user to the network-based application. ", "\n"*2, "Data Integrity: Protect end-user data that is being transported by, processed by, or stored by a network-based application against unauthorized modification, deletion, creation, and replication. The same types of considerations are applied to user data as it flows from the user to the network-based application. ", "\n"*2, "Availability: Ensure that access to the network-based application by authorized end-users or devices cannot be denied. This includes protection against active attacks such as Denial of Service (DoS) attacks as well as protection against passive attacks such as the modification or deletion of the end-user authentication information (e.g., user identifications and passwords). ", "\n"*2, "Privacy: Ensure that the network-based application does not provide information pertaining to the end-user's use of the application (e.g., web sites visited) to unauthorized personnel or devices. For example, only disclose this type of information to law enforcement personnel with a search warrant.", "\n")






    
else:
    print ("Try Again")
    
