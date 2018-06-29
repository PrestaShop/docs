/**
 * If you need measure the symfony page please disable the token
 * compliant with PrestaShop 1.7.3.2
 */
import scala.concurrent.duration._

import io.gatling.core.Predef._
import io.gatling.http.Predef._
import scala.concurrent.duration._

class ParcoursBackOffice extends Simulation {

  val httpConf = http
    .baseURL("https://yourUrlSite.com") // Here is the root for all relative URLs
    .acceptHeader("text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8") // Here are the common headers
    .doNotTrackHeader("1")
    .acceptLanguageHeader("en-US,en;q=0.5")
    .acceptEncodingHeader("gzip, deflate")
    .userAgentHeader("Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:16.0) Gecko/20100101 Firefox/16.0")

  val headers_10 = Map(
    "Cache-Control" -> "no-cache",
    "Content-Type" -> "application/x-www-form-urlencoded",
    "Pragma" -> "no-cache") // Note the headers specific to a given request

  val scn = scenario("parcours_backoffice") // A scenario is a chain of requests and pauses
    .exec(http("backoffice page")
      .get("/"))
    .pause(4) // Note that Gatling has recorded real time pauses

//-----------------------------------------------
//-----------------------------------------------

    .exec(http("connect")
      .post("/index.php?rand=1524833450885")
      .headers(headers_10)
      .formParam("ajax", "1")
      .formParam("token", "")
      .formParam("controller", "AdminLogin")
      .formParam("submitLogin", "1")
      .formParam("passwd", "myPassword")
      .formParam("email", "myemail@email.com"))

    .pause(3)

//dashboard
    .exec(http("Dashboard")
      .get("/index.php?controller=AdminDashboard"))
    .pause(3)
//sell
//orders
    .exec(http("Orders")
      .get("/index.php?controller=AdminOrders"))
    .pause(3)
    .exec(http("Invoices")
      .get("/index.php?controller=AdminInvoices"))
    .pause(3)
    .exec(http("Slip")
      .get("/index.php?controller=AdminSlip"))
    .pause(3)
    .exec(http("DeliverySlip")
      .get("/index.php?controller=AdminDeliverySlip"))
    .pause(3)
    .exec(http("Carts")
      .get("/index.php?controller=AdminCarts"))
    .pause(3)
//catalog
//page symfony
    .exec(http("Product_settings")
      .get("/index.php/product/catalog"))
    .pause(3)
    .exec(http("Categories")
      .get("/index.php?controller=AdminCategories"))
    .pause(3)
    .exec(http("Tracking")
      .get("/index.php?controller=AdminTracking"))
    .pause(3)
    .exec(http("Attributes")
      .get("/index.php?controller=AdminAttributesGroups"))
    .pause(3)
    .exec(http("Manufacturers")
      .get("/index.php?controller=AdminManufacturers"))
    .pause(3)
    .exec(http("Attachments")
      .get("/index.php?controller=AdminAttachments"))
    .pause(3)
    .exec(http("CartRules")
      .get("/index.php?controller=AdminCartRules"))
    .pause(3)
//page symfony
    .exec(http("Stocks")
      .get("/index.php/stock/"))
    .pause(3)
//customers
    .exec(http("Customers")
      .get("/index.php?controller=AdminCustomers"))
    .pause(3)
    .exec(http("Addresses")
      .get("/index.php?controller=AdminAddresses"))
    .pause(3)
//customer service
    .exec(http("CustomerThreads")
      .get("/index.php?controller=AdminCustomerThreads"))
    .pause(3)
    .exec(http("OrderMessage")
      .get("/index.php?controller=AdminOrderMessage"))
    .pause(3)
    .exec(http("Return")
      .get("/index.php?controller=AdminReturn"))
    .pause(3)
//stats
    .exec(http("Stats")
      .get("/index.php?controller=AdminStats"))
    .pause(3)
//improve
//modules
//page symfony
    .exec(http("Modules")
      .get("/index.php/module/catalog"))
    .pause(3)
//page symfony

//design
    .exec(http("Themes")
      .get("/index.php?controller=AdminThemes"))
    .pause(3)
    .exec(http("CmsContent")
      .get("/index.php?controller=AdminCmsContent"))
    .pause(3)
    .exec(http("ModulesPositions")
      .get("/index.php?controller=AdminModulesPositions"))
    .pause(3)
    .exec(http("LinkWidget")
      .get("/index.php?controller=AdminLinkWidget"))
    .pause(3)
//shipping
    .exec(http("Carriers")
      .get("/index.php?controller=AdminCarriers"))
    .pause(3)
    .exec(http("Shipping")
      .get("/index.php?controller=AdminShipping"))
    .pause(3)
//payment
    .exec(http("Payment")
      .get("/index.php?controller=AdminPayment"))
    .pause(3)
    .exec(http("PaymentPreferences")
      .get("/index.php?controller=AdminPaymentPreferences"))
    .pause(3)
//international
    .exec(http("Localization")
      .get("/index.php?controller=AdminLocalization"))
    .pause(3)
    .exec(http("Zones")
      .get("/index.php?controller=AdminZones"))
    .pause(3)
    .exec(http("Taxes")
      .get("/index.php?controller=AdminTaxes"))
    .pause(3)
    .exec(http("Translations")
      .get("/index.php?controller=AdminTranslations"))
    .pause(3)
//configure
//shop parameters
    .exec(http("Preferences")
      .get("/index.php?controller=AdminPreferences"))
    .pause(3)
    .exec(http("OrderPreferences")
      .get("/index.php?controller=AdminOrderPreferences"))
    .pause(3)
    .exec(http("Preferences")
      .get("/index.php?controller=AdminPPreferences"))
    .pause(3)
    .exec(http("CustomerPreferences")
      .get("/index.php?controller=AdminCustomerPreferences"))
    .pause(3)
    .exec(http("Contacts")
      .get("/index.php?controller=AdminContacts"))
    .pause(3)
    .exec(http("Meta")
      .get("/index.php?controller=AdminMeta"))
    .pause(3)
    .exec(http("SearchConf")
      .get("/index.php?controller=AdminSearchConf"))
    .pause(3)
//advanced parameters
//page symfony
    .exec(http("Performance")
      .get("/index.php/configure/advanced/performance"))
    .pause(3)
    .exec(http("Preferences")
      .get("/index.php?controller=AdminAdminPreferences"))
    .pause(3)
    .exec(http("Emails")
      .get("/index.php?controller=AdminEmails"))
    .pause(3)
    .exec(http("Import")
      .get("/index.php?controller=AdminImport"))
    .pause(3)
    .exec(http("Employees")
      .get("/index.php?controller=AdminEmployees"))
    .pause(3)
    .exec(http("RequestSql")
      .get("/index.php?controller=AdminRequestSql"))
    .pause(3)
    .exec(http("Logs")
      .get("/index.php?controller=AdminLogs"))
    .pause(3)
    .exec(http("Categories")
      .get("/index.php?controller=AdminBlockblogcategories"))
    .pause(3)

    .exec(http("Messages")
      .get("/index.php?controller=AdminBlockblogposts"))
    .pause(3)

    .exec(http("Commentaires")
      .get("/index.php?controller=AdminBlockblogcomments"))
    .pause(3)
    .exec(http("Stats_clients")
      .get("/index.php?controller=AdminStatistics"))

//---------------------------------------------
//---------------------------------------------

  setUp(scn.inject(atOnceUsers(1)).protocols(httpConf))
}